<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\GameEvent;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventController extends Controller
{
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
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diperbarui',
            'id' => $pendaftaran->id
        ]);
    }

    public function delete($id)
    {
        try {
            $contact = Pendaftaran::findOrFail($id);
            $contact->delete();

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
        // $data = Pendaftaran::find($id);
        // $data->delete();
        // return redirect()->route('admin.index')->with('success', 'Data Berhasil di Hapus');
    }


    public function articlegame()
    {
        $article = Article::all();
        return view('article', compact('article'));
    }

   


}
