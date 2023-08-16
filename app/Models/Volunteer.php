<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function rules($id = 0)
    {
        return [
            'fullname' => 'required|string|min:3|max:255',
            'phone_number' => 'required',
            'email' => "required|email|unique:volunteers,email,$id",
            'address' => 'required|string',
            'volunteered_before' => 'required|in:1,0',
            'skills' => 'required|in:1,0',
            'volunteered_start' => 'required|date',
            'volunteered_end' => 'required|date',
            'study_experience' => 'required|string',
            'resume' => 'required',
        ];
    }

    public static function messages()
    {
        return [
            'fullname.required' => __('validation.required name'),
            'phone_number.required' => __('validation.required phone'),
            'email.required' => __('validation.required email'),
            'email.email' => __('validation.valid email'),

            'address.required' => __('validation.required address'),
            'volunteered_before.required' => __('validation.required volunteered_before'),
            'skills.required' => __('validation.required skills'),
            'volunteered_start.required' => __('validation.required volunteered_start'),
            'volunteered_end.required' => __('validation.required volunteered_end'),
            'study_experience.required' => __('validation.required study_experience'),

            'resume.required' => __('validation.required resume'),
        ];
    }



}
