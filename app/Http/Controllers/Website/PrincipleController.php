<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Principle;

class PrincipleController extends Controller
{
    public function index()
    {
        $principles = Principle::select(
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'description_' . LaravelLocalization::getCurrentLocale() . ' as description',
        )->get();
        return view('principles', compact('principles'));
    }
}
