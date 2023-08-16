<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function rules($id = 0)
    {
        return [
            'organization_name' => 'required|string|min:3|max:255',
            'organization_type' => 'required|int',
            'address_main_branch' => 'required',
            'year_founded' => 'required|date',
            'website' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'annual_budget' => 'required|int',
            'number_centers' => 'required|int',
            'number_employees' => 'required|int',
            'center_locations' => 'required|string|min:6',
            'ministry_interior_no' => 'required',
            'ministry_finance_no' => 'required',
            'number_current_projects' => 'required|int',
            'donors' => 'required',
            'numberemployees_you_deal_with' => 'required',
            'nationalities_beneficiaries' => 'required',
            'beneficiary_age_group' => 'required',
            'upcoming_goals' => 'required',
            'company_registration_certificate_ministry_interior' => 'required|file',
            'company_organizational_structure' => 'required|file',
        ];
    }

    public static function messages()
    {
        return [
            'organization_name.required' => '|string|min:3|max:255',
            'organization_type' => 'required|int|exists:organization_types,id',
            'address_main_branch' => 'required',
            'year_founded' => 'required|date',
            'website' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'annual_budget' => 'required|int',
            'number_centers' => 'required|int',
            'number_employees' => 'required|int',
            'center_locations' => 'required|string|min:6',
            'ministry_interior_no' => 'required',
            'ministry_finance_no' => 'required',
            'number_current_projects' => 'required|int',
            'donors' => 'required',
            'numberemployees_you_deal_with' => 'required',
            'nationalities_beneficiaries' => 'required',
            'beneficiary_age_group' => 'required',
            'upcoming_goals' => 'required',
            'company_registration_certificate_ministry_interior' => 'required|file',
            'company_organizational_structure' => 'required|file',
        ];
    }

}
