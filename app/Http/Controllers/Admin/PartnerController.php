<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Partner::orderBy('id', 'desc')->select('*');

            return FacadesDataTables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('image', function($row) {
                $url =asset("storage/images/partners/$row->image");
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
                                data-partner_id="'.$row->id.'"
                                data-link="'.$row->link.'"
                                data-image="'.$row->image.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            ->make(true);
        }

        return view('admin.partner.index');
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
                "link"   => "required",
                "image"   => "required",
            ]);
//            start upload file
            $image = $request->file('image');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('images/partners', $fileName, ['disk' => 'public']);
//            end upload file
            $store = Partner::create([
                "link" => $request->link,
                "image" => $fileName,
            ]);
            // session()->flash('add');
            return response()->json([
                'status' => 'success',
                'data' => $store
            ], 201);
            // return redirect()->route('partners.index');
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
        $partner = Partner::findOrFail($request->partner_id);
        try {
            $request->validate([
                "link"   => "required",
            ]);
//            start upload file
            if($file = $request->file('image')) {
                Storage::disk('public')->delete("images/partners/$partner->image");
                $fileName = time() . $file->getClientOriginalName();
                $file->storeAs('images/partners', $fileName, 'public');
            }
//            end upload file
            $update = $partner->update([
                "link" => $request->link,
                "image" => $fileName ?? $partner->image,
            ]);
            session()->flash('update');
            return redirect()->route('partners.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $delete = Partner::findOrFail($id);
        Storage::disk('public')->delete("images/partners/$delete->image");
        $delete->delete();
        // session()->flash('delete');
        return response()->json([
            'status' => 'success',
        ], 201);
        // return redirect()->route('partners.index');
    }
}
