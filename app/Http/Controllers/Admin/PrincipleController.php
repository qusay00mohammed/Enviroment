<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Principle;

class PrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principles = Principle::orderBy('id', 'desc')->get();
        return view('admin.principles.index', compact('principles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.principles.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
                "description_ar" => "required",
                "description_en" => "required",
            ]);

            $store = Principle::create([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
            ]);
            // session()->flash('add');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('principles.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
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
        $principle = Principle::findOrfail($id);
        return view('admin.principles.edit', compact('principle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $principle = Principle::findOrfail($id);

            $request->validate([
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
                "description_ar" => "required",
                "description_en" => "required",
            ]);

            $update = $principle->update([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
            ]);
            session()->flash('update');
            return redirect()->route('principles.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $delete = Principle::findOrFail($id)->delete();
            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('principles.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
