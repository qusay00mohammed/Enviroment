<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Goal::orderBy('id', 'desc')->get();

            return DataTables::of($data)
            ->addColumn('id', function ($row) {
                // This will automatically generate row indexes
                static $count = 1;
                return $count++;
            })
            ->addcolumn('date', function($row) {
                return $row->updated_at->toFormattedDateString();
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    $btn .= '<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-goal_id="'.$row->id.'"
                                data-title_ar="'.$row->title_ar.'"
                                data-title_en="'.$row->title_en.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            ->make(true);
        }
        return view('admin.goals.basic-goal');
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
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
            ]);
            $store = Goal::create($request->all());
            // session()->flash('add');
            // return redirect()->route('goals.index');
            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
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
        $goal = Goal::findOrFail($request->goal_id);
        try {
            $request->validate([
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
            ]);

            $update = $goal->update($request->all());
            session()->flash('update');
            return redirect()->route('goals.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $goal = Goal::findOrFail($id)->delete();
        // session()->flash('delete');
        return response()->json([
            'status' => 'success',
        ], 201);
        // return redirect()->route('goals.index');
    }
}
