<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::select(
            'id',
            'image',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
        )->orderBy('id', 'desc')->paginate(4);
        return view('programs', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
//            'image',
        )->findOrFail($id);
        return view('program_details', compact('program'));
    }
}
