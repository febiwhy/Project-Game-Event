<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use App\Models\GameEvent;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\GameEventFollower;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pendaftaran::with('gameEvent')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('game_event', function ($row) {
                    return $row->gameEvent->name;
                })
                ->rawColumns(['game_event'])
                ->make(true);
        }

        $data = Pendaftaran::all();
        $game_events = GameEvent::all();
        $event_communitys = GameEventFollower::with('gameEvent')->get();
        return view('landing', compact('game_events', 'event_communitys', 'data'));
    }

    public function exportpdf()
    {
        $pendaftaran = Pendaftaran::with('gameEvent')->get();
        $pdf = FacadePdf::loadView('pdf.data_pendaftaranpdf', compact('pendaftaran'));
        return $pdf->download('data_pendaftaran.pdf');
    }

    // public function admin(Request $request)
    // {
       
    //     $admin = User::role('admin')->get();
    //     return view('admin.index', compact('admin'));
    // }
    // public function user(Request $request)
    // {
    //     $users = User::role('user')->get();
    //     return view('admin.user.index', compact('users'));
    // }

}


