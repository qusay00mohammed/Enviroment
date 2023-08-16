<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function rules($id = 0)
    {
        return [
            'fullname' => 'required|string|min:3|max:255',
            'phone_number' => 'required',
            'email' => "required|email|unique:jobs,email,$id",
            'gender' => 'required|in:male,female',
            'degree' => 'required|in:bachelor,diploma,college_student,high_school',
            'birthdate' => 'required|date',
            'resume' => 'required|file',
        ];
    }

    public static function messages()
    {
        return [
            'name.required' => __('validation.required name'),
            'name.min' => __('validation.name min'),
            'phone_number.required' => __('validation.required phone'),
            'email.required' => __('validation.required email'),
            'email.email' => __('validation.valid email'),

            'gender.required' => __('validation.required gender'),
            'degree.required' => __('validation.required degree'),
            'birthdate.required' => __('validation.required birthdate'),
            'resume.required' => __('validation.required resume'),
        ];
    }

}
