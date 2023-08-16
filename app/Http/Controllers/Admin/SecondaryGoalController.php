<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\ListGoal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SecondaryGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $goals = Goal::all();
        if($request->ajax()) {
            $data = ListGoal::orderBy('id', 'desc')->select('*');


            return DataTables::of($data)
            ->addColumn('id', function ($row) {
                // This will automatically generate row indexes
                static $count = 1;
                return $count++;
            })
            ->addcolumn('basic_goal', function($row) {
                return $row->basic_goal->title_ar;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    $btn .= '<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-description_goal_id="'.$row->id.'"
                                data-description_goal_ar="'.$row->description_goal_ar.'"
                                data-description_goal_en="'.$row->description_goal_en.'"
                                data-goal_id="'.$row->goal_id.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            // ->rawColumns(['action', 'status'])
            ->make(true);
        }


        return view('admin.goals.secondary-goal', compact('goals'));
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
                "description_goal_ar" => "required",
                "description_goal_en" => "required",
                "goal_id" => "required",
            ]);
            $store = ListGoal::create($request->all());
            // session()->flash('add');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('list-goal.index');
        } catch (\Exception $e) {
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
        $goal = ListGoal::findOrFail($request->goal_id);
        try {
            $request->validate([
                "description_goal_ar" => "required",
                "description_goal_en" => "required",
                "goal_id" => "required",
            ]);

            $update = $goal->update($request->all());
            session()->flash('update');
            return redirect()->route('list-goal.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $goal = listGoal::findOrFail($id)->delete();
        // session()->flash('delete');
        return response()->json([
            'status' => 'success',
        ], 201);
        // return redirect()->route('list-goal.index');
    }
}
