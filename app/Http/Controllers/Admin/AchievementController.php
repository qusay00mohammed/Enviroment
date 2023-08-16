<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {

            $data = Achievement::orderBy('id', 'desc')->select('*');
            return FacadesDataTables::of($data)
            ->addColumn('id', function ($row) {
                // This will automatically generate row indexes
                static $count = 1;
                return $count++;
            })
            ->addColumn('image', function($row) {
                $url =asset("storage/images/achievements/$row->image");
                return '<img height="60px" width="70px" style="border-radius: 7px" src="'. $url .'">';

            })->escapeColumns([])
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    $btn .= '<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-achievement_id="'.$row->id.'"
                                data-title_en="'.$row->title_en.'"
                                data-title_ar="'.$row->title_ar.'"
                                data-number="'.$row->number.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            // ->rawColumns(['action', 'status'])
            ->make(true);
        }

        return view('admin.achievement.index');
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
                "number"   => "required",
                "image"   => "required",
            ]);
//            start upload file
            $image = $request->file('image');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('images/achievements', $fileName, ['disk' => 'public']);
//            end upload file
            $store = Achievement::create([
                "title_ar" => $request->title_ar,
                "title_en" => $request->title_en,
                "number" => $request->number,
                "image" => $fileName,
            ]);
            // session()->flash('add');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('achievements.index');
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
        $achievement = Achievement::findOrFail($request->achievement_id);
        try {
            $request->validate([
                "title_ar"   => "required|string|min:3|max:255",
                "title_en"   => "required|string|min:3|max:255",
                "number"   => "required",
            ]);
//            start upload file
            if($file = $request->file('image')) {
                Storage::disk('public')->delete("images/achievements/$achievement->image");
                $fileName = time() . $file->getClientOriginalName();
                $file->storeAs('images/achievements', $fileName, 'public');
            }
//            end upload file
            $update = $achievement->update([
                "title_ar" => $request->title_ar,
                "title_en" => $request->title_en,
                "number" => $request->number,
                "image" => $fileName ?? $achievement->image,
            ]);
            session()->flash('update');
            return redirect()->route('achievements.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $delete = Achievement::findOrFail($id);
        Storage::disk('public')->delete("images/achievements/$delete->image");
        $delete->delete();
        // session()->flash('delete');
        return response()->json([
            'status' => 'success',
        ], 201);
        // return redirect()->route('achievements.index');
    }
}
