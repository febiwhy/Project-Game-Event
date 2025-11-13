<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\PreRegistration;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\PreregisterRequest;

class PreRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PreRegistration::select(['id', 'name', 'email', 'amount', 'status']);


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown">
                                        <i class="icon-menu7"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="' . route('pre-registration.show', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-stats"></i> Detail Data
                                        </a>
                                        <a href="' . route('pre-registration.edit', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-text2"></i> Edit Data
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete(' . $row->id . ')">
                                            <i class="icon-file-minus"></i> Hapus Data
                                        </a>
                                    </div>
                                </div>
                            </div>';
                })
                ->rawColumns(['action', 'role', 'activity'])
                ->make(true);
        }
        return view('admin.account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pre = PreRegistration::all();
        return view('auth.preregister', compact('pre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pre_registrations,email',
        ]);

        $kodeUnik = rand(100, 999);
        $total = 100000 + $kodeUnik;

        $pre = PreRegistration::create([
            'name' => $request->name,
            'email' => $request->email, 
            'amount' => $total,
        ]);
        return view('auth.preregister-payment', compact('pre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pre = PreRegistration::findOrFail($id);
        return view('admin.account.pre-register.show', compact('pre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pre = PreRegistration::findOrFail($id);
        return view('admin.account.pre-register.edit', compact('pre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Ambil data yang mau diupdate
        $pre = PreRegistration::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pre_registrations,email,' . $id,
            'amount' => 'required|numeric',
            'status' => 'required|in:waiting_payment,waiting_approval',
        ]);

        // Update data
        $pre->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil disimpan!',
            'id' => $pre->id
        ]);

        // Redirect ke halaman tertentu (misal daftar preregistrasi)
        // return redirect()->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
