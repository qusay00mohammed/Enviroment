<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\ContactDetail;
use App\Models\ContactUs;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ContactUsController extends Controller
{

    public function index()
    {
        $social = Social::select('icon','link')->get();
        $contactDetails = ContactDetail::select(
            'image',
            'title_' . laravelLocalization::getCurrentLocale() . ' as title'
        )->get();
        return view('contact_us', compact('social', 'contactDetails'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fullname' => "required",
                'email' => "required|email",
                'message' => "required",
            ], [
                'fullname.required' => __('validation.required name'),
                'email.required' => __('validation.required email'),
                'email.email' => __('validation.valid email'),
                'message.required' => __('validation.required message'),

            ]);

            ContactUs::create([
                'fullname' => $request->post('fullname'),
                'email' => $request->post('email'),
                'message' => $request->post('message'),
            ]);

            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
