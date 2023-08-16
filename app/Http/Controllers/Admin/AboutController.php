<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = AboutUs::orderBy('id', 'desc')->get();
        return view('admin.about-us.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about-us.add');
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
                "image" => "file|required"
            ]);

            // start upload image
            $image = $request->file('image');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('images/about-us', $fileName, ['disk' => 'public']);
            // end upload image
            $store = AboutUS::create([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
                "image" => $fileName,
            ]);
            // session()->flash('add');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('about-us.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
        $about = AboutUs::findOrFail($id);
        return view('admin.about-us.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = AboutUs::findOrFail($id);
        // dd($about);
        try {
            $request->validate([
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
                "description_ar" => "required",
                "description_en" => "required",
                // "image" => "file|required"
            ]);

            // start upload image
            if ($image = $request->file('image')) {
                $fileName = time() . $image->getClientOriginalName();
                $image->storeAs('images/about-us', $fileName, ['disk' => 'public']);
                Storage::disk('public')->delete("images/about-us/$about->image");
//                unlink(public_path("storage/images/about-us/$about->image"));
            }
            // end upload image
            $store = $about->update([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
                "image" => $fileName ?? $about->image,
            ]);
            session()->flash('update');
            return redirect()->route('about-us.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $delete = AboutUS::findOrFail($id);
            Storage::disk('public')->delete("images/about-us/$delete->image");
            $delete->delete();
            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('about-us.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
