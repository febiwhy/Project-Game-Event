<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        if (Auth::user()->hasRole(['admin'])) {
            return redirect()->intended('admin')->withSuccess('Signed in');
        } else{
            return redirect()->intended('landing')->withSuccess('Signed in');
        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerpost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole('user');

        return redirect()->route('login')->withSuccess('Akun berhasil dibuat. Silakan login.');
    }

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
