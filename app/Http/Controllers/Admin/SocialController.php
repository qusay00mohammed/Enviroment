<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Setting::where('group', 'social')->get();
        return view('admin.social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "name_ar" => "required|string|min:3|max:255",
                "name_en" => "required|string|min:3|max:255",
                "icon" => "required",
                "link" => "required",
            ]);
            $store = Social::create($request->all());
            session()->flash('add');
            return redirect()->route('socials.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $social = Setting::findOrFail($request->social_id);
        try {
            $request->validate([
                "key" => "required|string|min:3|max:255",
                "value_ar" => "required|string|min:3|max:255",
            ]);
            $store = $social->update([
                'key' => $request->key,
                'value_ar' => $request->value_ar,
                'value_en' => $request->value_ar,
            ]);
            session()->flash('update');
            return redirect()->route('socials.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $social = Social::findOrFail($request->social_id)->delete();
        session()->flash('delete');
        return redirect()->route('socials.index');
    }
}
