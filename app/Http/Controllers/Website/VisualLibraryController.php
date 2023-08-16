<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class VisualLibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
        )->orderBy('id', 'desc')->paginate(4);

        return view('visual_library', compact('libraries'));
    }

    public function show($id)
    {
        $library = Library::select(
            'id',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title',
            'description_' . laravelLocalization::getCurrentLocale() . ' as description',
        )->with('images')->findOrFail($id);
        return view('album_presentation', compact('library'));
    }
}
