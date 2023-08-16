<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class ObjectiveController extends Controller
{
    public function index()
    {
        $objectives = Goal::select(
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
        )->with('goals')->get();
        return view('objectives', compact('objectives'));
    }
}
