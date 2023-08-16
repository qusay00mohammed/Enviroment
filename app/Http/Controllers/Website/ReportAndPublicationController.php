<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class ReportAndPublicationController extends Controller
{
    public function report()
    {
        $collection = Publication::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
           'image',
           'updated_at',
        )->orderBy('id', 'desc')->get();

        return view('publications', compact('collection'));
    }

    public function publication()
    {
        $collection = Publication::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
           'image',
           'updated_at',
        )->orderBy('id', 'desc')->get();

        return view('publications', compact('collection'));
    }
}
