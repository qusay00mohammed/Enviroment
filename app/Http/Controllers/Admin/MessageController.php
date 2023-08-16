<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use DataTables;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $messages = ContactUs::all();
        return view('admin.message.index');
    }

    public function getMessageDatatable()
    {
        $data = ContactUs::select('*')->orderBy('id', 'desc');

        // dd($data);

        return Datatables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a href=" ' . route("messages.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                return $btn;
            })
            // ->rawColumns(['action', 'status'])
            ->make(true);
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
        //
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
        $message = ContactUs::findOrFail($id);
        return view('admin.message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $message = ContactUs::findOrFail($id);
            $request->validate([
                'fullname' => "required",
                'email' => "required|email",
                'message' => "required",
            ]);

            $message->update([
                'fullname' => $request->post('fullname'),
                'email' => $request->post('email'),
                'message' => $request->post('message'),
            ]);

            session()->flash('update');
            return redirect()->route('messages.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ContactUs::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
