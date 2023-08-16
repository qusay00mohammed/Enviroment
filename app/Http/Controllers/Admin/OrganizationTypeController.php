<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationType;
use App\Models\Setting;
use Illuminate\Support\Str;


class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Setting::where('group', 'organizations')->orderBy('id', 'desc')->get();
        return view('admin.organization-type.index', compact('organizations'));
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
                "value_ar"   => "required",
                "value_en"   => "required",
            ]);

            $store = Setting::create([
                'key' => Str::uuid(),
                "value_ar" => $request->value_ar,
                "value_en" => $request->value_en,
                'type' => 'text',
                'group' => 'organizations'

            ]);
            session()->flash('add');
            return redirect()->route('organizations.index');
        } catch(\Exception $e) {
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
        $organizations = Setting::findOrFail($request->organization_id);
        try {
            $request->validate([
                "value_ar"   => "required",
                "value_en"   => "required",
            ]);

            $store = $organizations->update([
                "value_ar" => $request->value_ar,
                "value_en" => $request->value_en,
            ]);
            session()->flash('update');
            return redirect()->route('organizations.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Setting::findOrFail($id);
        $delete->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
        // session()->flash('delete');
        // return redirect()->route('organizations.index');
    }
}
