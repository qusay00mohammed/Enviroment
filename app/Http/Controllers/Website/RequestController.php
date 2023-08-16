<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\Job;
use App\Models\Company;
use App\Models\Setting;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class RequestController extends Controller
{
    public function company_index()
    {
        $organizations = Setting::where('group', 'organizations')->select(
            'id',
            'value_' . laravelLocalization::getCurrentLocale() . ' as type',
        )->get();
        return view('companyrequest', compact('organizations'));
    }
    public function company_store(Request $request)
    {
        try {
            $request->validate(Company::rules());

            // start upload company_registration_certificate_ministry_interior
            $image1 = $request->file('company_registration_certificate_ministry_interior');
            $fileName1 = time() . $image1->getClientOriginalName();
            $image1->storeAs('certificate', $fileName1, ['disk' => 'public']);
            // end upload company_registration_certificate_ministry_interior

            // start upload company_organizational_structure
            $image2 = $request->file('company_organizational_structure');
            $fileName2 = time() . $image2->getClientOriginalName();
            $image2->storeAs('organizationalStructure', $fileName2, ['disk' => 'public']);
            // end upload company_organizational_structure

            Company::create([
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
                'company_organizational_structure' => $fileName2,
                'company_registration_certificate_ministry_interior' => $fileName1,
            ]);
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['errors'=>$e->getMessage()]))->withInput();
        }
    }


    public function job_index()
    {
        return view('jobrequest');
    }
    public function job_store(Request $request)
    {
        // $validated = 'errors';
        try {
            $request->validate(Job::rules(), Job::messages());
            // start upload resume
            $image = $request->file('resume');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('resume', $fileName, ['disk' => 'public']);
            // end upload resume
            Job::create([
                'fullname' => $request->fullname,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'gender' => $request->gender,
                'degree' => $request->degree,
                'birthdate' => $request->birthdate,
                'resume' => $fileName,
            ]);
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['errors'=>$e->getMessage()]))->withInput();
        }
    }


    public function volunteer_index()
    {
        return view('volunteerrequest');
    }
    public function volunteer_store(Request $request)
    {
        try {
            $request->validate(Volunteer::rules(), Volunteer::messages());
            // start upload resume
            $image = $request->file('resume');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('resume', $fileName, ['disk' => 'public']);
            // end upload resume
            Volunteer::create([
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
                'resume' => $fileName,
            ]);
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['errors'=>$e->getMessage()]))->withInput();
        }
    }
}
