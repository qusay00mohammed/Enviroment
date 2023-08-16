<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use DataTables;


class VolunteerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $volunteer = Volunteer::all();
        return view('admin.volunteer_request.index');
    }

    public function getVolunteerDatatable()
    {
        $data = Volunteer::select('*')->orderBy('id', 'desc');

        // dd($data);

        return Datatables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a href=" ' . route("volunteer-requests.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                return $btn;
            })
            ->addColumn('resume', function ($row) {
                $q1 = '<a href="' . asset("storage/resume/$row->resume") . '">هنا</a>';
                return $q1;
            })->escapeColumns([])

            ->addColumn('volunteered_before', function ($row) {
                return $row->volunteered_before == 1 ? "Yes" : "No";
            })
            ->addColumn('skills', function ($row) {
                return $row->skills == 1 ? "Yes" : "No";
            })

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
        $volunteer = Volunteer::findOrfail($id);
        return view('admin.volunteer_request.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $volunteer = Volunteer::findOrfail($id);

            if(!($request->file('resume'))) {

                $request->merge([
                    'resume' => $volunteer->resume
                ]);

            }

            $request->validate(Volunteer::rules($id));


            // start upload resume
            if($image = $request->file('resume'))
            {
                $fileName = time() . $image->getClientOriginalName();
                $image->storeAs('resume', $fileName, ['disk' => 'public']);
            }
            // end upload resume

            $volunteer->update([
                'fullname' => $request->fullname,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address,
                'volunteered_before' => $request->volunteered_before,
                'volunteered_details' => $request->volunteered_details ?? null,
                'skills' => $request->skills,
                'skills_details' => $request->skills_details ?? null,
                'volunteered_start' => $request->volunteered_start,
                'volunteered_end' => $request->volunteered_end,
                'study_experience' => $request->study_experience,
                'resume' => $fileName ?? $request->resume,
            ]);
            session()->flash('update');
            return redirect()->route('volunteer-requests.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Volunteer::findOrFail($id)->delete();

        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
