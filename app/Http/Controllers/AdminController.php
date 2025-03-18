<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = Pendaftaran::all();
        $user = auth()->user();
        return view('admin.index', compact('data', 'user', 'users'));
    }

    public function users()
    {
        return view('admin.index');
    }

    public function datatables(Request $request)
    {
        if ($request->ajax()) {
            $columns = ['id', 'name', 'email', 'created_at', 'updated_at']; 

            // Ambil request DataTables
            $limit  = $request->input('length'); // Jumlah data per halaman
            $start  = $request->input('start'); // Offset mulai data
            $order  = $columns[$request->input('order.0.column')]; // Kolom yang diurutkan
            $dir    = $request->input('order.0.dir'); // Arah sorting (asc/desc)
            $search = $request->input('search.value'); // Kata kunci pencarian

            // Query dasar
            $query = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);

            // Jika ada pencarian
            if (!empty($search)) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            }

            // Total data setelah filter
            $filteredCount = $query->count();

            // Sorting dan pagination
            $users = $query->orderBy($order, $dir)
                ->offset($start)
                ->limit($limit)
                ->get();

            // Total data asli (tanpa filter)
            $totalCount = User::count();

            // Return response JSON sesuai format DataTables
            return response()->json([
                'draw'            => intval($request->input('draw')),
                'recordsTotal'    => $totalCount,
                'recordsFiltered' => $filteredCount,
                'data'            => $users
            ]);
        }
    }

    public function getpdf(Request $request)
    {
        $users = User::all();

        $data = [
            'title' => 'Daftar Pengguna',
            'date' => date('d-m-Y'),
            'users' => $users
        ];

        $pdf = FacadePdf::loadView('pdf.penggunaPDF', $data);
        return $pdf->download('Daftar Pengguna.pdf');
    }

    public function export()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }


}

