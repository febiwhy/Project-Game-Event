<?php

namespace App\Http\Controllers;

use App\Models\GameEvent;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // public function index($id)
    // {
    //     $game_event = GameEvent::findOrFail($id);
    //     $pendftars = pendaftaran::with('gameEvent')->get();
    //     $events = GameEvent::all();
    //     return view('pendaftaran', compact('game_event', 'pendftars', 'events'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([

    //         'event_pendaftaran_id' => 'required|exists:game_events,id',
    //         'game_pendaftar_id' => 'required|exists:game_events,id',
    //         'nama' => 'required|string|max:255',
    //         'email' => 'required|email|unique:pendaftaran,email',
    //         'id_number' => 'required|string|max:20',
    //         'whatsapp' => 'required|string|max:15',
    //         'alamat' => 'required|string|max:255',
    //         'status' => 'nullable|string|in:Menunggu',
    //         'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    //     ]);

    //     $pendaftar_event = GameEvent::findOrFail($request->event_pendaftaran_id);

    //     if ($pendaftar_event->slot_filled >= $pendaftar_event->slot_limit) {
    //         return redirect()->back()->with('error', 'Slot Sudah Penuh!');
    //     }

    //     // Simpan foto jika ada
    //     $foto_path = null;
    //     if ($request->hasFile('foto')) {
    //         $foto_path = $request->file('foto')->store('foto', 'public'); // Simpan ke storage/app/public/foto
    //     }

    //     // Simpan data ke database
    //     Pendaftaran::create([
    //         'event_pendaftaran_id' => $request->event_pendaftaran_id,
    //         'game_pendaftar_id' => $request->game_pendaftar_id,
    //         'pendaftar_id' => auth()->id(),
    //         'nama' => $request->nama,
    //         'email' => $request->email,
    //         'id_number' => $request->id_number,
    //         'whatsapp' => $request->whatsapp,
    //         'alamat' => $request->alamat,
    //         'status' => $request->status ?? 'Menunggu',
    //         'foto' => $foto_path,
    //     ]);

    //     return redirect()->route('game-event.show', $pendaftar_event->id)->with('success', 'Pendaftaran berhasil!');
    // }

    public function update($id)
    {

        $pendaftaran = Pendaftaran::findOrFail($id);
        $events = GameEvent::all();

        return view('action.edit', compact('pendaftaran', 'events'));
    }

    public function updatedata(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'id_number' => 'required|string',
            'whatsapp' => 'required|string',
            'alamat' => 'required|string',
            'status' => 'required|string',
            'game_pendaftar_id' => 'required|exists:game_events,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Cari data pendaftaran berdasarkan ID
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Update data utama
        $pendaftaran->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'id_number' => $request->id_number,
            'whatsapp' => $request->whatsapp,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'game_pendaftar_id' => $request->game_pendaftar_id,
        ]);

        // Cek dan simpan foto baru jika diunggah
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pendaftaran', 'public');
            $pendaftaran->update(['foto' => "/storage/" . $path]);
        }

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('admin.index', $id)->with('success', 'Data pendaftaran berhasil diperbarui!');
    }



    public function delete($id)
    {
        $data = Pendaftaran::find($id);
        $data->delete();
        return redirect()->route('admin.index')->with('success', 'Data Berhasil di Hapus');
    }


    public function article(){
        return view('article');
    }

   


}
