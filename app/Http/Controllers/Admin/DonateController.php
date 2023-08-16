<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use DataTables;


class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $donates = Donate::all();
        return view('admin.donate.index');
    }

    public function getDonateDatatable()
    {
        $data = Donate::select('*')->orderBy('id', 'desc');

        // dd($data);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a href=" ' . route("donates.edit", $row->id) . '"><i class="text-info fas fa-edit"></i>&nbsp;&nbsp</a>';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                return $btn;
            })
            ->addColumn('status', function ($row) {
                return $row->status == 'paid' ? 'تمت عملية الدفع' : 'لم تتم عمليه الدفع';
            })
            ->addColumn('introducing_donor', function ($row) {
                return $row->introducing_donor == 1 ? 'نعم' : "لا";
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
        $donate = Donate::findOrFail($id);
        return view('admin.donate.edit', compact('donate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $donate = Donate::findOrFail($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'amount' => 'required',
            ]);

            $update = $donate->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'phone' => $request->post('phone'),
                'project_donate' => $request->post('project_donate') ?? null,
                'message' => $request->post('message') ?? null,
                'introducing_donor' => $request->post('introducing_donor') ?? 0,
                'amount' => $request->post('amount'),
            ]);

            session()->flash('update');
            return redirect()->route('donates.index');

        } catch(\Exception $e){
            return redirect()->back()->withError('not created successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Donate::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
