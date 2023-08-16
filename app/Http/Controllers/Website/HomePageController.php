<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\News;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Slider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomePageController extends Controller
{
    public function index()
    {
//        sliders
        $sliders = Slider::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
            'image'
        )->get(); // return collection
//        news
        $news = News::select(
            'id',
            'slug',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'short_description_' . laravelLocalization::getCurrentLocale() . ' as short_description',
        )->where('status', 'active')->take(5)->get();
//        Programs
        $programs = Program::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
//            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
            'image',
        )->take(4)->get();
//        Partners
        $partners = Partner::select(
            'id',
            'link',
            'image',
        )->get();
//        Achievement
        $achievements = Achievement::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'image',
            'number',
        )->take(4)->get();
        return view('index', get_defined_vars());
    }
}
