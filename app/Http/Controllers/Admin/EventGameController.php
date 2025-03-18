<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\GameEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\EventGameRequest;
use App\Http\Requests\Admin\GameEventRequest;

class EventGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game_events = GameEvent::get();
        return view('admin.game-event.index', compact('game_events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.game-event.create-edit', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameEventRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('thumbnail')) {
            // Simpan file ke "storage/app/public/game-event"
            $path = $request->file('thumbnail')->store('game-event', 'public');

            // Simpan path yang benar untuk ditampilkan di frontend
            $data['thumbnail'] = "/storage/" . $path;
        }
        
        $data['slot_limit'] = $request->slot_limit ?? 0;
        $data['slot_filled'] = 0; // Awalnya 0

        GameEvent::create($data);
        return redirect()->route('game-event.index')->with('success', "Data Berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game_event = GameEvent::findOrFail($id);
        return view('admin.game-event.show', compact('game_event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $game_event = GameEvent::findOrFail($id);
        // $game_event = GameEvent::with('user')->findOrFail($id);
        return view('admin.game-event.create-edit', compact('game_event', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameEventRequest $request, $id)
    {
        // panggil data
        $game_event = GameEvent::findOrFail($id);

        // validasi
        $data = $request->validated();
        if ($request->hasFile('thumbnail')) {
            // Simpan file ke "storage/app/public/game-event"
            $path = $request->file('thumbnail')->store('game-event', 'public');

            // Simpan path yang benar untuk ditampilkan di frontend
            $data['thumbnail'] = "/storage/" . $path;
        }
        $data['description'] = $request->description ? $request->description : "ini deskripsi";

        if ($request->has('slot_limit')) {
            $data['slot_limit'] = $request->slot_limit;
        }
        // update data
        $game_event->update($data);

        return redirect()->route('game-event.show', $id)->with('success', "data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game_event = GameEvent::findOrFail($id);
        $game_event->delete();

        return redirect()->route('game-event.index')->with('success', "data berhasil di hapus");
    }

    public function tambahSlot($id)
    {
        $game_event = GameEvent::findOrFail($id);

        if ($game_event->slot_filled < $game_event->slot_limit) {
            $game_event->increment('slot_filled');
            return redirect()->back()->with('success', "Slot berhasil ditambahkan!");
        }

        return redirect()->back()->with('error', "Slot sudah penuh!");
    }

    // Metode untuk mengurangi slot event
    public function kurangiSlot($id)
    {
        $game_event = GameEvent::findOrFail($id);

        if ($game_event->slot_filled > 0) {
            $game_event->decrement('slot_filled');
            return redirect()->back()->with('success', "Slot berhasil dikurangi!");
        }

        return redirect()->back()->with('error', "Tidak ada slot yang bisa dikurangi!");
    }

}
