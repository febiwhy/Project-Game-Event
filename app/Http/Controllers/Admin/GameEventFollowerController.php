<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\GameEvent;
use Illuminate\Http\Request;
use App\Models\GameEventFollower;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\GameEventFollowerRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GameEventFollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = GameEventFollower::with(['gameEvent', 'owner'])->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('game_event', function ($row) {
                    return $row->gameEvent->name ?? '-';
                })
                ->addColumn('owner', function ($row) {
                    return $row->owner->name ?? '-';
                })

                ->addColumn('action', function ($row) {
                    return '<div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown">
                                        <i class="icon-menu7"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="' . route('event-community.show', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-stats"></i> Detail Data
                                        </a>
                                        <a href="' . route('event-community.edit', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-text2"></i> Edit Data
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete(' . $row->id . ')">
                                            <i class="icon-file-minus"></i> Hapus Data
                                        </a>
                                    </div>
                                </div>
                            </div>';
                })
                ->rawColumns(['action', 'owner', 'game_event'])
                ->make(true);
        }

        $event_communitys = GameEventFollower::with(['gameEvent', 'owner'])->get();
        return view('admin.event-community.index', compact('event_communitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $user_id = Auth::user()->id;
        $game_events = GameEvent::all();

        return view('admin.event-community.create-edit', compact('users', 'game_events', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameEventFollowerRequest $request)
    {
        $data = $request->validated();

        // Ubah array member jadi string
        if (isset($data['member']) && is_array($data['member'])) {
            $data['member'] = implode(',', $data['member']);
        }

        $communities = GameEventFollower::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil disimpan!',
            'id' => $communities->id
        ]);
        // return redirect()->route('event-community.index')->with('success', "Data Berhasil Disimpan");
    }

    public function show($id)
    {
        $game_event_follower = GameEventFollower::findOrFail($id);
        $event_communitys = GameEventFollower::with('gameEvent')->get();
        return view('admin.event-community.show', compact('event_communitys', 'game_event_follower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game_event_follower = GameEventFollower::findOrFail($id);
        $communities = GameEventFollower::with('owner')->findOrFail($id);
        $game_events = GameEvent::all();
        $users = User::all();
        return view('admin.event-community.create-edit', compact('game_event_follower', 'game_events', 'users', 'communities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameEventFollowerRequest $request, $id)
    {
        $event_community = GameEventFollower::findOrFail($id);

        $data = $request->validate([
            'game_event_id' => 'required|exists:game_events,id',
            'user_id' => 'required|exists:users,id',
            'owner_id' => 'required|exists:users,id',
            'name_community' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'member' => 'required|array',
            'description' => 'nullable|string|max:500',
        ]);

        // Ubah array jadi string sebelum update
        if (isset($data['member']) && is_array($data['member'])) {
            $data['member'] = implode(',', $data['member']);
        }

        $event_community->update($data);

        return redirect()->route('event-community.index', $id)->with('success', "Data Berhasil Diperbarui");
    }

    public function destroy($id)
    {
        try {
            $event_community = GameEventFollower::findOrFail($id);
            $event_community->delete();

        return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan! Data gagal dihapus.',
                'error' => $e->getMessage()
            ], 500);
        }
        // return redirect()->route('event-community.index')->with('success', "Data Berhasil Di Hapus");
    }
}
