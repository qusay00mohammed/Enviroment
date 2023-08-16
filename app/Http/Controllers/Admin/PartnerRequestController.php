<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Setting;
use DataTables;

class PartnerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $partners = Company::all();
        return view('admin.partner_request.index');
    }

    public function getPartnerDatatable()
    {
        $data = Company::select('*')->orderBy('id', 'desc');

        // dd($data);

        return Datatables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a href=" ' . route("partner-requests.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                return $btn;
            })
            ->addColumn('company_registration_certificate_ministry_interior', function ($row) {
                return '<a href="' . asset("storage/certificate/$row->company_registration_certificate_ministry_interior") . '">هنا</a>';
            })->escapeColumns([])

            ->addColumn('website', function ($row) {
                return '<a href="' . $row->website . '">هنا</a>';
            })->escapeColumns([])

            ->addColumn('company_organizational_structure', function ($row) {
                return '<a href="' . asset("storage/organizationalStructure/$row->company_organizational_structure") . '">هنا</a>';
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
        $partner = Company::findOrFail($id);
        $organization = Setting::where('group', 'organizations')->select(
            'id',
            'value_ar',
        )->get();
        return view('admin.partner_request.edit', compact('partner', 'organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $partner = Company::findOrFail($id);
            $request->validate([
                'organization_name' => 'required',
                'organization_type' => 'required',
                'address_main_branch' => 'required',
                'year_founded' => 'required',
                'website' => 'required',
                'facebook' => 'required',
                'instagram' => 'required',
                'annual_budget' => 'required',
                'number_centers' => 'required',
                'number_employees' => 'required',
                'center_locations' => 'required',
                'ministry_interior_no' => 'required',
                'ministry_finance_no' => 'required',
                'number_current_projects' => 'required',
                'donors' => 'required',
                'numberemployees_you_deal_with' => 'required',
                'nationalities_beneficiaries' => 'required',
                'beneficiary_age_group' => 'required',
                'upcoming_goals' => 'required',
                // 'company_registration_certificate_ministry_interior' => 'required',
                // 'company_organizational_structure' => 'required',
            ]);

            // dd($request->all());
            // start upload company_registration_certificate_ministry_interior
            if($image1 = $request->file('company_registration_certificate_ministry_interior'))
            {
                $fileName1 = time() . $image1->getClientOriginalName();
                $image1->storeAs('certificate', $fileName1, ['disk' => 'public']);
            }
            // end upload company_registration_certificate_ministry_interior

            // start upload company_organizational_structure
            if($image2 = $request->file('company_organizational_structure'))
            {
                $fileName2 = time() . $image2->getClientOriginalName();
                $image2->storeAs('organizationalStructure', $fileName2, ['disk' => 'public']);
            }
            // end upload company_organizational_structure

            $partner->update([
                'organization_name' => $request->organization_name,
                'organizationType_id' => $request->organization_type,
                'address_main_branch' => $request->address_main_branch,
                'year_founded' => $request->year_founded,
                'website' => $request->website,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'annual_budget' => $request->annual_budget,
                'number_centers' => $request->number_centers,
                'number_employees' => $request->number_employees,
                'center_locations' => $request->center_locations,
                'ministry_interior_no' => $request->ministry_interior_no,
                'ministry_finance_no' => $request->ministry_finance_no,
                'number_current_projects' => $request->number_current_projects,
                'donors' => $request->donors,
                'numberemployees_you_deal_with' => $request->numberemployees_you_deal_with,
                'nationalities_beneficiaries' => $request->nationalities_beneficiaries,
                'beneficiary_age_group' => $request->beneficiary_age_group,
                'upcoming_goals' => $request->upcoming_goals,
                'company_organizational_structure' => $fileName2 ?? $partner->company_organizational_structure,
                'company_registration_certificate_ministry_interior' => $fileName1 ?? $partner->company_registration_certificate_ministry_interior,
            ]);
            session()->flash('update');
            return redirect()->route('partner-requests.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Company::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
