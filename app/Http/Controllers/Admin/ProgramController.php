<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->get();
        return view('admin.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program.add');
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
            $image->storeAs('images/programs', $fileName, ['disk' => 'public']);
            // end upload image
            $store = Program::create([
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
            // return redirect()->route('programs.index');
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
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = program::findOrFail($id);
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
                $image->storeAs('images/programs', $fileName, ['disk' => 'public']);
                Storage::disk('public')->delete("images/programs/$program->image");
//                unlink(public_path("storage/images/about-us/$about->image"));
            }
            // end upload image
            $store = $program->update([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
                "image" => $fileName ?? $program->image,
            ]);
            session()->flash('update');
            return redirect()->route('programs.index');
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
            $delete = Program::findOrFail($id);
            Storage::disk('public')->delete("images/programs/$delete->image");
            $delete->delete();
            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('programs.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'error' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
