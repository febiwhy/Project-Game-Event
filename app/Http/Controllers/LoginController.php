<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PreRegistration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan, Silahkan daftar.',
            ])->withInput($request->only('email'));
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            // Password salah
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->withInput($request->only('email'));
        }

        Cache::put('user-is-online-' . Auth::id(), true, now()->addMinutes(10));

        if (Auth::user()->hasRole('admin')) {
            return redirect()->intended('admin')->withSuccess('Signed in');
        } else {
            if (in_array(Auth::user()->status, ['pending', 'approved'])) {
                return redirect()->intended('landing')->withSuccess('Signed in');
            } else {
                Auth::logout();
                return back()->with('error', 'Gagal masuk, silakan menunggu persetujuan dari admin.');
            }
        }


        // dd(Auth::user());

        // if (Auth::user()->hasRole(['admin'])) {
        //     return redirect()->intended('admin')->withSuccess('Signed in');
        // } else{
        //     if (Auth::user()->status == 'pending') {
        //         return redirect()->intended('landing')->withSuccess('Signed in');
        //     } else {
        //         Auth::logout();
        //         return back()->with('error', 'gagal masuk, silahkan menunggu persetujuan dari admin');
        //     }
        // }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerpost(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
                'payment_proof' => 'required|image|max:2048',
            ]);

            if ($request->hasFile('payment_proof')) {
                $payment_proof = "/storage/" . $request->file('payment_proof')->store('register/payment_proof', 'public');
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 'pending', // pakai nilai aman dulu
                'payment_proof' => $payment_proof,
            ]);

            $user->assignRole('user');

            // coba ubah status, tapi kalau gagal jangan tampilkan error SQL
            try {
                $user->status = 'waiting_approval';
                $user->save();
            } catch (\Throwable $th) {
                Log::warning("Gagal update status user: " . $th->getMessage());
                // lanjut aja, biar user tetap terdaftar
            }

            return back()->with('success', 'Akun berhasil dibuat. Silakan menunggu persetujuan dari admin. Jika tidak disetujui dalam waktu 7 hari, akun akan dihapus.');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.');
        }
    }

    // public function registerpost(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6|confirmed',
    //         'payment_proof' => 'required|image|max:2048',
    //     ]);

    //     $pre = PreRegistration::where('email', $request->email)->first();
    //     // if (!$pre || $pre->status != 'waiting_payment') {
    //     //     return back()->withErrors(['email' => 'Email belum valid atau belum pra-daftar.']);
    //     // }
    //     if (!$pre) {
    //         return back()->withErrors(['email' => 'Email belum terdaftar untuk pra-registrasi.'])->withInput();
    //     }
    //     if ($pre->status == 'waiting_approval') {
    //         return back()->withErrors(['email' => 'Anda sudah mengirim bukti pembayaran dan sedang menunggu persetujuan admin.'])->withInput();
    //     }
    //     if ($pre->status != 'waiting_payment') {
    //         return back()->withErrors(['email' => 'Status pra-registrasi tidak valid.'])->withInput();
    //     }
    //     if ($request->hasFile('payment_proof')) {
    //         $path = $request->file('payment_proof')->store('payment_proofs', 'public');
    //         $proofPath = '/storage/' . $path;
    //     }
    //     // $proofPath = $request->file('payment_proof')->store('payment_proofs');

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'status' => 'pending',
    //         'payment_proof' => $proofPath,
    //     ]);
    //     $user->assignRole('user');

    //     $pre->status = 'waiting_approval';
    //     $pre->save();

    //     return redirect()->route('login')->withSuccess('Akun berhasil dibuat. Silakan login.');
    // $pre = PreRegistration::where('email', $request->email)->first();

    // if (!$pre) {
    //     return back()->withErrors(['email' => 'Email belum valid atau belum pra-daftar.']);
    // }
    // if ($pre->status == 'waiting_payment') {
    //     return back()->withErrors(['email' => 'Status pembayaran tidak valid.']);
    // }
    // }

    public function landing()
    {
        if (Auth::check()) {
            return view('/');
        }

        return redirect("login")->withSuccess('Anda tidak diizinkan mengakses');
    }

    public function logout()
    {
        Cache::forget('user-is-online-' . Auth::id());
        Session::flush();
        Auth::logout();

        return Redirect(url('/landing'));
    }
}
