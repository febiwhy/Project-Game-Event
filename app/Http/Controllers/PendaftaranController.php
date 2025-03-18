<?php

namespace App\Http\Controllers;

use App\Models\GameEvent;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{

    public function pendaftaran($id)
    {
        $game_event = GameEvent::findOrFail($id);
        $pendftars = pendaftaran::with('gameEvent')->get();
        $events = GameEvent::all();
        return view('pendaftaran', compact('game_event', 'pendftars', 'events'));
    }

    public function pendaftarandata(Request $request)
    {
        $request->validate([

            'event_pendaftaran_id' => 'required|exists:game_events,id',
            'game_pendaftar_id' => 'required|exists:game_events,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftaran,email',
            'id_number' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'status' => 'nullable|string|in:Menunggu',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $pendaftar_event = GameEvent::findOrFail($request->event_pendaftaran_id);

        if ($pendaftar_event->slot_filled >= $pendaftar_event->slot_limit) {
            return redirect()->back()->with('error', 'Slot Sudah Penuh!');
        }

        // Simpan foto jika ada
        $foto_path = null;
        if ($request->hasFile('foto')) {
            $foto_path = $request->file('foto')->store('foto', 'public'); // Simpan ke storage/app/public/foto
        }

        // Simpan data ke database
        Pendaftaran::create([
            'event_pendaftaran_id' => $request->event_pendaftaran_id,
            'game_pendaftar_id' => $request->game_pendaftar_id,
            'pendaftar_id' => auth()->id(),
            'nama' => $request->nama,
            'email' => $request->email,
            'id_number' => $request->id_number,
            'whatsapp' => $request->whatsapp,
            'alamat' => $request->alamat,
            'status' => $request->status ?? 'Menunggu',
            'foto' => $foto_path,
        ]);

        return redirect()->route('game-event.show', $pendaftar_event->id)->with('success', 'Pendaftaran berhasil!');
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::findOrfail($id);
        $pendaftar_event = Pendaftaran::with('gameEvent')->get();
        return view('action.show', compact('pendaftaran', 'pendaftar_event'));
        
    }
}
