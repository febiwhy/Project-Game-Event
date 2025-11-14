<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameEvent;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserEventParticipation;
use App\Services\CoinService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    protected $coinService;

    public function __construct(CoinService $coinService)
    {
        $this->coinService = $coinService;
    }

    public function pendaftaran($id)
    {
        $game_event = GameEvent::findOrFail($id);
        $pendftars = Pendaftaran::with('gameEvent')->get();
        $events = GameEvent::all();
        $userCoins = auth()->check() ? auth()->user()->coins : 0;
        return view('pendaftaran', compact('game_event', 'pendftars', 'events', 'userCoins'));
    }

    public function pendaftarandata(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'event_pendaftaran_id' => 'required|exists:game_events,id',
            'game_pendaftar_id' => 'required|exists:game_events,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftaran,email',
            'id_number' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:15',
            'alamat' => 'required|string|max:500',
            'status' => 'nullable|string|in:Menunggu',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'email.unique' => 'Email ini sudah terdaftar. Gunakan email lain.',
            'foto.required' => 'Foto wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
            'id_number.required' => 'ID Number wajib diisi.',
            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan validasi!',
                    'errors' => $validator->errors()
                ], 422);
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $pendaftar_event = GameEvent::findOrFail($request->event_pendaftaran_id);

            // Cek slot available
            if ($pendaftar_event->slot_filled >= $pendaftar_event->slot_limit) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Slot sudah penuh!'
                    ], 400);
                }
                return redirect()->back()->with('error', 'Slot Sudah Penuh!');
            }

            // Cek apakah user sudah mendaftar event ini sebelumnya
            $existingRegistration = Pendaftaran::where('pendaftar_id', auth()->id())
                ->where('event_pendaftaran_id', $request->event_pendaftaran_id)
                ->first();

            if ($existingRegistration) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Anda sudah terdaftar di event ini!'
                    ], 400);
                }
                return redirect()->back()->with('error', 'Anda sudah terdaftar di event ini!');
            }

            // Simpan foto
            $foto_path = null;
            if ($request->hasFile('foto')) {
                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $request->file('foto')->getClientOriginalExtension();
                $foto_path = $request->file('foto')->storeAs('foto', $filename, 'public');
            }

            // Simpan data pendaftaran
            $pendaftaran = Pendaftaran::create([
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

            // Berikan koin untuk partisipasi
            $user = User::find(auth()->id());
            $coinReward = $this->coinService->rewardParticipation($user, $pendaftar_event);

            // Prepare response message
            $successMessage = 'Pendaftaran berhasil!';
            $coinMessage = "🎉 Anda mendapatkan {$coinReward['base_coins']} koin!";

            if ($coinReward['bonus_coins'] > 0) {
                $coinMessage .= " 🎊 Bonus {$coinReward['bonus_coins']} koin untuk partisipasi ke-{$coinReward['participation_count']}!";
            }

            $coinMessage .= " Total koin Anda: {$coinReward['total_coins']}";

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage,
                    'coin_message' => $coinMessage,
                    'total_coins' => $coinReward['total_coins'],
                    'id' => $pendaftaran->id
                ]);
            }

            return redirect()->route('game-event.show', $pendaftar_event->id)
                ->with('success', $successMessage)
                ->with('coin_message', $coinMessage);
        } catch (\Exception $e) {
            \Log::error('Error dalam pendaftaran: ' . $e->getMessage());

            $errorMessage = 'Terjadi kesalahan sistem. Silakan coba lagi!';

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 500);
            }

            return redirect()->back()
                ->with('error', $errorMessage)
                ->withInput();
        }
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Cek authorization
        if ($pendaftaran->pendaftar_id !== auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $pendaftar_event = Pendaftaran::with('gameEvent')->get();
        $participationHistory = UserEventParticipation::with('gameEvent')
            ->where('user_id', $pendaftaran->pendaftar_id)
            ->orderBy('participation_count', 'desc')
            ->get();

        return view('action.show', compact('pendaftaran', 'pendaftar_event', 'participationHistory'));
    }

    public function coinHistory()
    {
        $user = auth()->user();
        $participations = UserEventParticipation::with('gameEvent')
            ->where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        $totalCoins = $user->coins;
        $totalEvents = $participations->count();
        $totalParticipations = $participations->sum('participation_count');

        return view('coins.history', compact('participations', 'totalCoins', 'totalEvents', 'totalParticipations'));
    }
}
