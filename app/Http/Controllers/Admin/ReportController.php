<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Report::orderBy('id', 'desc')->select('*');

            return DataTables::of($data)
            ->addColumn('id', function ($row) {
                // This will automatically generate row indexes
                static $count = 1;
                return $count++;
            })
            ->addColumn('image', function($row) {
                $url =asset("storage/images/reports/$row->image");
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
                                data-report_id="'.$row->id.'"
                                data-title_ar="'.$row->title_ar.'"
                                data-title_en="'.$row->title_en.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            // ->rawColumns(['action', 'status'])
            ->make(true);
        }

        return view('admin.report.index');
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
        // dd($request->all());
        try {
            $request->validate([
                "title_ar"   => "required|string|min:3|max:255",
                "title_en"   => "required|string|min:3|max:255",
                "image"   => "required",
            ]);
//            start upload file
            $image = $request->file('image');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('images/reports', $fileName, ['disk' => 'public']);
//            end upload file
            $store = Report::create([
                "title_ar" => $request->title_ar,
                "title_en" => $request->title_en,
                "image" => $fileName,
            ]);
            // session()->flash('add');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('reports.index');
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
        $report = Report::findOrFail($request->report_id);
        try {
            $request->validate([
                "title_ar"   => "required|string|min:3|max:255",
                "title_en"   => "required|string|min:3|max:255",
            ]);
//            start upload file
            if($file = $request->file('image')) {
                Storage::disk('public')->delete("images/reports/$report->image");
                $fileName = time() . $file->getClientOriginalName();
                $file->storeAs('images/reports', $fileName, 'public');
            }
//            end upload file
            $update = $report->update([
                "title_ar" => $request->title_ar,
                "title_en" => $request->title_en,
                "image" => $fileName ?? $report->image,
            ]);
            session()->flash('update');
            return redirect()->route('reports.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $delete = Report::findOrFail($id);
        Storage::disk('public')->delete("images/reports/$delete->image");
        $delete->delete();
        // session()->flash('delete');
        return response()->json([
            'status' => 'success',
        ], 201);
        // return redirect()->route('reports.index');
    }
}
