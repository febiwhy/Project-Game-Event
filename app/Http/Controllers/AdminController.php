<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameEvent;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Exports\UserExport;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pendaftaran::with('gameEvent', 'user')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('game_event', function ($row) {
                    return $row->gameEvent->name;
                })
                ->addColumn('action', function ($row) {
                    return '<div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown">
                                        <i class="icon-menu7"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="' . route('pendaftar.show', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-stats"></i> Detail Data
                                        </a>
                                        <a href="' . route('pendaftaran.edit', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-text2"></i> Edit Data
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete(' . $row->id . ')">
                                            <i class="icon-file-minus"></i> Hapus Data
                                        </a>
                                    </div>
                                </div>
                            </div>';
                })
                ->rawColumns(['game_event', 'action'])
                ->make(true);
        }

        $totalgameEvent = GameEvent::count();
        $users = User::all();
        $data = Pendaftaran::all();
        $user = auth()->user();
        $totalusers = $users->filter(function ($user) {
            return Cache::has('user-is-online-' . $user->id);
        })->count();
        return view('admin.index', compact('data', 'user', 'users', 'totalgameEvent', 'totalusers'));
    }

    public function users()
    {
        return view('admin.index');
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




