<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\AboutUs;

class AboutController extends Controller
{
    public function index($id)
    {
        $about = AboutUs::select(
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
            'image'
        )->findOrFail($id);
        return view('about-association', compact('about'));
    }
}
