<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;

class DonateController extends Controller
{
    public function index()
    {
        return view('donate');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|min:3|max:70',
                'email' => 'required|email',
                'phone' => 'required',
                'amount' => 'required|int|min:1|max:999999',
            ], [
                'name.required' => __('validation.required name'),
                'email.required' => __('validation.required email'),
                'email.email' => __('validation.valid email'),
                'phone.required' => __('validation.required phone'),
                'amount.required' => __('validation.required amount'),
                'amount.int' => __('validation.amount int'),
                'amount.min' => __('validation.amount min'),
                'amount.max' => __('validation.amount max'),

            ]);

            $store = Donate::create([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'phone' => $request->post('phone'),
                'project_donate' => $request->post('project_donate') ?? null,
                'message' => $request->post('message') ?? null,
                'introducing_donor' => $request->post('introducing_donor') ?? '0',
                'amount' => $request->post('amount'),
            ]);

            $numberamount = intval($request->amount);
            //  Start Stripe
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $session = \Stripe\Checkout\Session::create([
                'line_items' =>  [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => "Name: " . $store->name,
                        ],
                        'unit_amount' => $numberamount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('success', ["id" => $store->id], true),
                'cancel_url' => route('cancel', ["id" => $store->id], true),
            ]);

            return redirect($session->url);
            // return redirect()->route('detail_booking', ['id' => $mile->id, 'email' => $mile->email])->withSuccess('created successfully');

        } catch(\Exception $e){
            // return redirect()->back()->withError('not created successfully');
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['errors'=>$e->getMessage()]))->withInput();
        }
    }

    public function success($id)
    {
        $donate = Donate::findOrFail($id);
        $donate->update([
            'status' => "paid",
        ]);
        $donate->save();
        session()->flash('add');
        return redirect()->route('donate.index');
    }

    public function cancel($id)
    {
        $donate = Donate::findOrFail($id)->delete();
        return redirect()->route('donate.index')->withErrors(['errors' => "error"]);
    }



}
