<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Yajra\DataTables\Services\Datatables;
// use App\DataTables\NewsDataTable;
use DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = News::query();

            // Date Range Filtering
            if (isset($request->start_date) && isset($request->end_date)) {
                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');

                $data->whereBetween('created_at', [$start_date, $end_date]);
            }

            // Name Filtering
            if (isset($request->title_advance)) {
                $name = $request->input('title_advance');
                $data->where('title_ar', 'like', '%' . $name . '%');
            }

            // Description Filtering
            if (isset($request->desc)) {
                $description = $request->input('desc');
                $data->where('description_ar', 'like', '%' . $description . '%');
            }




            $data = $data->select('*')->orderBy('id', 'desc');



            return FacadesDataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {
                    if ($row->images->first() != null) {
                        foreach ($row->images as $image) {
                            $url = asset("storage/images/news/$image->filename");
                            break;
                        }
                        return '<img height="60px" width="70px" style="border-radius: 7px" src="' . $url . '">';
                    } else {
                        return 'لا يوجد صورة';
                    }
                })->escapeColumns([])
                ->addcolumn('status', function ($row) {

                    $checked = $row->status == 'active' ? 'checked' : '';
                    if ($row->status == 'active') {
                        $status = "1";
                    } else {
                        $status = "2";
                    }

                    return "<input $checked onchange='checkboxFun($status, $row->id)' type='checkbox' style='height: 20px; width: 20px;'>";
                })->escapeColumns([])
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("news.edit", $row->slug) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                                </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.news.index');
    }

    public function status(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
                'status' => 'required',
            ]);
            $news = News::findOrfail($request->id);
            if ($request->status == '2') {
                $news->status = 'active';
            } else if ($request->status == '1') {
                $news->status = 'unactive';
            }

            $news->save();

            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
            ], 400);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.add');
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
                "short_description_ar" => "required|string|min:3|max:255",
                "short_description_en" => "required|string|min:3|max:255",
                "files" => "required|array",
                "keywords_ar" => "required",
                "keywords_en" => "required",
            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }


            // $request->validate();



            $store = News::create([
                "title_ar" => $request->post('title_ar'),
                "title_en" => $request->post('title_en'),
                "description_ar" => $request->post('description_ar'),
                "description_en" => $request->post('description_en'),
                "short_description_en" => $request->post('short_description_en'),
                "short_description_ar" => $request->post('short_description_ar'),
                "slug" => Str::slug($request->post('title_en')),
                "keywords_en" => $request->post('keywords_en'),
                "keywords_ar" => $request->post('keywords_ar'),
            ]);


            // start upload image
            foreach ($request->file() as $file) {
                foreach ($file as $f) {
                    $fileName = time() . $f->getClientOriginalName();
                    $f->storeAs('images/news', $fileName, ['disk' => 'public']);
                    $store->images()->create([
                        "filename" => $fileName,
                    ]);
                }
                break;
            }
            // end upload image


            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
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
        $news = News::where('slug', $id)->first();
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {

    //     dd($request->all());


    //     $news = News::findOrFail($id);
    //     try {

    //         $validator = Validator::make($request->all(), [
    //             "title_ar" => "required|string|min:3|max:255",
    //             "title_en" => "required|string|min:3|max:255",
    //             "description_ar" => "required",
    //             "description_en" => "required",
    //             "short_description_ar" => "required|string|min:3|max:255",
    //             "short_description_en" => "required|string|min:3|max:255",
    //             "keywords_ar" => "required",
    //             "keywords_en" => "required",
    //         ]);

    //         //Now check validation:
    //         if ($validator->fails()) {
    //             return Response::make(['errors' => $validator->errors()->first()], 400);
    //         }


    //         $store = $news->update([
    //             "title_ar" => $request->title_ar,
    //             "title_en" => $request->title_en,
    //             "description_ar" => $request->description_ar,
    //             "description_en" => $request->description_en,
    //             "short_description_en" => $request->short_description_en,
    //             "short_description_ar" => $request->short_description_ar,
    //             "keywords_en" => $request->keywords_en,
    //             "keywords_ar" => $request->keywords_ar,
    //         ]);


    //         // start upload image
    //         if ($request->file()) {
    //             foreach ($request->file() as $file) {
    //                 foreach ($file as $f) {
    //                     $fileName = time() . $f->getClientOriginalName();
    //                     $f->storeAs('images/news', $fileName, ['disk' => 'public']);
    //                     $store->images()->create([
    //                         "filename" => $fileName,
    //                     ]);
    //                 }
    //                 break;
    //             }
    //         }
    //         // end upload image


    //         return response()->json([
    //             'status' => 'success',
    //         ], 201);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'errors' => $e->getMessage(),
    //         ], 400);
    //         // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
    //     }
    // }

    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $delete = News::findOrFail($id);
            foreach ($delete->images as $image) {
                $fileName = $image->filename;
                Storage::disk('public')->delete("images/news/$fileName");
                $image->delete();
            }
            $delete->delete();
            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('news.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function deleteImage(string $id)
    {
        try {
            $delete = Image::findOrFail($id);

            if ($delete->fileable_type == 'App\Models\News') {
                Storage::disk('public')->delete("images/news/$delete->filename");
            }

            if ($delete->fileable_type == 'App\Models\Library') {
                Storage::disk('public')->delete("images/libraries/$delete->filename");
            }

            $delete->delete();

            // session()->flash('delete');
            return response()->json([
                'status' => 'success',
            ], 201);
            // return redirect()->route('news.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
