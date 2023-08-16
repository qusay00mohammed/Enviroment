<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;


class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $libraries = Library::with('images')->orderBy('id', 'desc')->get();

        if($request->ajax()) {
            $data = Library::orderBy('id', 'desc')->select('*');

            return FacadesDataTables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                            <i class="text-danger fas fa-trash-alt"></i>
                        </a>';

                $btn .= '<a href="'.route('libraries.edit', [$row->id]).'"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            ->make(true);
        }

        return view('admin.library.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.library.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
                "description_ar" => "required",
                "description_en" => "required",
                "files" => "required|array",
            ]);

            if ($validator->fails())
            {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }
            // $request->validate();

            DB::beginTransaction();
            $store = Library::create([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
            ]);

            // start upload image
            foreach ($request->file() as $file)
            {
                foreach ($file as $f)
                {
                    $fileName = time() . $f->getClientOriginalName();
                    $f->storeAs('images/libraries', $fileName, ['disk' => 'public']);

                    $store->images()->create([
                        "filename" => $fileName,
                    ]);
                }
                break;
            }
            // end upload image
            DB::commit();
            // session()->flash('add');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('libraries.index');
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
        $library = Library::findOrFail($id);
        return view('admin.library.edit', compact('library'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $library = Library::findOrFail($id);
        try {
            $request->validate([
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
                "description_ar" => "required",
                "description_en" => "required",
            ]);

            DB::beginTransaction();
            $update = $library->update([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
            ]);

            // start upload image
            if ($images = $request->file()) {

                foreach ($images as $file)
                {
                    foreach ($file as $image)
                    {
                        // start upload image
                        $fileName = time() . $image->getClientOriginalName();
                        $image->storeAs('images/libraries', $fileName, ['disk' => 'public']);

                        $library->images()->create([
                            "filename" => $fileName,
                        ]);
//                        $storeFile = Image::create([
//                            'image' => $fileName,
//                            'library_id' => $id,
//                        ]);
                        // end upload image
                    }
                    break;
                }
            }
            // end upload image
            DB::commit();

            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->getMessage(),
            ], 400);
    }
}

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request, string $id)
    {
        try {
            $delete = Library::findOrFail($id);
            foreach ($delete->images as $image)
            {
                $fileName = $image->filename;
                Storage::disk('public')->delete("images/libraries/$fileName");
            }
            $delete->delete();
            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('libraries.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
