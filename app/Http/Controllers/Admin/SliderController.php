<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "title_ar" => "bail|required|string|min:3|max:255",
                "title_en" => "bail|required|string|min:3|max:255",
                "description_ar" => "bail|required|string|min:3",
                "description_en" => "bail|required|string|min:3",
                "image" => "bail|file|required"
            ]);

            // start upload image
            $image = $request->file('image');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('images/slider', $fileName, ['disk' => 'public']);
            // end upload image
            $store = Slider::create([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
                "image" => $fileName,
            ]);

            // session()->flash('add');
            // return redirect()->route('slider.index');
            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'error' => $e->getMessage(),
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        // dd($about);
        try {
            $request->validate([
                "title_ar" => "required",
                "title_en" => "required",
                "description_ar" => "required",
                "description_en" => "required",
                // "image" => "file|required"
            ]);

            // start upload image
            if ($image = $request->file('image')) {
                $fileName = time() . $image->getClientOriginalName();
                $image->storeAs('images/slider', $fileName, ['disk' => 'public']);
                Storage::disk('public')->delete("images/slider/$slider->image");
//                unlink(public_path("storage/images/about-us/$about->image"));
            }
            // end upload image
            $store = $slider->update([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
                "image" => $fileName ?? $slider->image,
            ]);
            session()->flash('update');
            return redirect()->route('slider.index');
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
            $delete = Slider::findOrFail($id);
            Storage::disk('public')->delete("images/slider/$delete->image");
            $delete->delete();
            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'error' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
