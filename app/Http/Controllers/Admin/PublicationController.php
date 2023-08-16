<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Publication::orderBy('id', 'desc')->select('*');

            return DataTables::of($data)
            ->addColumn('id', function ($row) {
                // This will automatically generate row indexes
                static $count = 1;
                return $count++;
            })
            ->addColumn('image', function($row) {
                $url =asset("storage/images/publications/$row->image");
                return '<img height="60px" width="70px" style="border-radius: 7px" src="'. $url .'">';

            })->escapeColumns([])
            ->addcolumn('date', function($row) {
                return $row->updated_at->toFormattedDateString();
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    $btn .= '<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-publication_id="'.$row->id.'"
                                data-title_ar="'.$row->title_ar.'"
                                data-title_en="'.$row->title_en.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            // ->rawColumns(['action', 'status'])
            ->make(true);
        }

        return view('admin.publication.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "title_ar"   => "required|string|min:3|max:255",
                "title_en"   => "required|string|min:3|max:255",
                "image"   => "required",

            ]);
//            start upload file
            $file = $request->file('image');
            $fileName = time() . $file->getClientOriginalName();
            $file->storeAs('images/publications', $fileName, 'public');
//            end upload file
            $store = Publication::create([
                "title_ar" => $request->title_ar,
                "title_en" => $request->title_en,
                "image" => $fileName,
            ]);
            // session()->flash('add');
            // return redirect()->route('publications.index');
            return response()->json([
                'status' => 'success',
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publication = Publication::findOrFail($request->publication_id);
        try {
            $request->validate([
                "title_ar"   => "required|string|min:3|max:255",
                "title_en"   => "required|string|min:3|max:255",
            ]);
//            start upload file
            if($file = $request->file('image')) {
                Storage::disk('public')->delete("images/publications/$publication->image");
                $fileName = time() . $file->getClientOriginalName();
                $file->storeAs('images/publications', $fileName, 'public');
            }
//            end upload file
            $update = $publication->update([
                "title_ar" => $request->title_ar,
                "title_en" => $request->title_en,
                "image" => $fileName ?? $publication->image,
            ]);
            session()->flash('update');
            return redirect()->route('publications.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $delete = Publication::findOrFail($id);
        Storage::disk('public')->delete("images/publications/$delete->image");
        $delete->delete();
        return response()->json([
            'status' => 'success',
        ], 200);
        // session()->flash('delete');
        // return redirect()->route('publications.index');
    }
}
