<?php

namespace App\Http\Controllers;

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

    // public function datatable(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $columns = ['nama', 'email', 'id_number', 'alamat', 'status', 'game_event_name'];

    //         $limit  = $request->input('length');
    //         $start  = $request->input('start');
    //         $order  = $columns[$request->input('order.0.column')];
    //         $dir    = $request->input('order.0.dir');
    //         $search = $request->input('search.value');

    //         $query = Pendaftaran::with('gameEvent');

    //         if (!empty($search)) {
    //             $query->where(function ($q) use ($search) {
    //                 $q->where('pendaftran.name', 'like', "%{$search}%")                    
    //                 ->orWhere('pendaftran.email', 'like', "%{$search}%")                    
    //                 ->orWhere('pendaftran.id_number', 'like', "%{$search}%")                    
    //                 ->orWhere('pendaftran.alamat', 'like', "%{$search}%")                    
    //                 ->orWhere('pendaftran.status', 'like', "%{$search}%")                    
    //                 ->orWhereHas('gameEvent', function ($q) use ($search) {
    //                     $q->where('name', 'like', "%{$search}%");
    //                 });
    //             });
    //         }

    //         $filtercount = $query->count();

    //         $pendaftaran = $query->orderBy($order, $dir)
    //             ->offset($start)
    //             ->limit($limit)
    //             ->get()
    //             ->map(function ($item, $index) use ($start) {
    //                 $item->no = $start + $index + 1;
    //                 $item->game_event_name = $item->gameEvent->name ?? '-';
    //                 return $item;
    //             });

    //         $totalCount = Pendaftaran::count();

    //         return response()->json([
    //             'draw'              => intval($request->input('draw')),
    //             'recordsTotal'      => $totalCount,
    //             'recordsFiltered'   => $filtercount,
    //             'data'              => $pendaftaran
    //         ]);
    //     }
    // }
}


