<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use DataTables;

class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jobs = Job::all();
        return view('admin.job_request.index');
    }

    public function getJobDatatable()
    {
        $data = Job::select('*')->orderBy('id', 'desc');

        // dd($data);

        return Datatables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a href=" ' . route("job-requests.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                return $btn;
            })
            ->addColumn('resume', function ($row) {
                return '<a href="' . asset("storage/resume/$row->resume") . '">هنا</a>';
            })->escapeColumns([])
            // ->rawColumns(['action', 'status'])
            ->make(true);
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
        //
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
        $job = Job::findOrFail($id);
        return view('admin.job_request.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $job = Job::findOrFail($id);
            $request->validate([
                'fullname' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'gender' => 'required',
                'degree' => 'required',
                'birthdate' => 'required',
                // 'resume' => 'required',
            ]);
            // start upload resume
            if($image = $request->file('resume'))
            {
                $fileName = time() . $image->getClientOriginalName();
                $image->storeAs('resume', $fileName, ['disk' => 'public']);
            }
            // end upload resume
            $job->update([
                'fullname' => $request->fullname,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'gender' => $request->gender,
                'degree' => $request->degree,
                'birthdate' => $request->birthdate,
                'resume' => $fileName ?? $job->resume,
            ]);
            session()->flash('update');
            return redirect()->route('job-requests.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Job::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
