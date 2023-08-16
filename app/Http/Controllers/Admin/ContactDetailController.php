<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_details = Setting::where('group', 'contact_details')->orderBy('id', 'desc')->get();
        return view('admin.contact-details.index', compact('contact_details'));
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
//        dd($request->all());
        try {
            $request->validate([
                "title_ar" => "required|string|min:3|max:255",
                "title_en" => "required|string|min:3|max:255",
                "image" => "required",
            ]);
//            start upload file
            $image = $request->file('image');
            $fileName = time() . $image->getClientOriginalName();
            $image->storeAs('images/contact-details', $fileName, ['disk' => 'public']);
//            end upload file

            $store = ContactDetail::create([
                "title_ar" => $request->title_ar,
                "title_en" => $request->title_en,
                "image" => $fileName,
            ]);
            session()->flash('add');
            return redirect()->route('contact-details.index');
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
        $contact_detail = Setting::findOrFail($request->contact_detail_id);
        try {
            $request->validate([
                "value_ar" => "required|string|min:3|max:255",
                "value_en" => "required|string|min:3|max:255",
            ]);

            $store = $contact_detail->update([
                "value_ar" => $request->value_ar,
                "value_en" => $request->value_en,
            ]);
            session()->flash('update');
            return redirect()->route('contact-details.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $social = ContactDetail::findOrFail($request->contact_detail_id);
        Storage::disk('public')->delete("images/contact-details/$social->image");
        $social->delete();
        session()->flash('delete');
        return redirect()->route('contact-details.index');
    }
}
