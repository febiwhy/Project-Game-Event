<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\GameEvent;
use Illuminate\Http\Request;
use App\Models\GameEventFollower;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameEventFollowerRequest;
use Illuminate\Support\Facades\Auth;

class GameEventFollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        GameEventFollower::create($data);

        return redirect()->route('event-community.index')->with('success', "Data Berhasil Disimpan");
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

        return redirect()->route('event-community.show', $id)->with('success', "Data Berhasil Diperbarui");
    }

    public function destroy($id)
    {
        $event_community = GameEventFollower::findOrFail($id);
        $event_community->delete();
        return redirect()->route('event-community.index')->with('success', "Data Berhasil Di Hapus");
    }

}
