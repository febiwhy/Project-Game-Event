<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator =  $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole(['admin'])) {
                return redirect()->intended('admin')
                    ->withSuccess('Signed in');
            } else {
                return redirect()->intended('landing')->withSuccess('Signed in');
            }
        }
        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerlogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $user->assignRole('user');

        return redirect(route('/'))->withSuccess('Anda telah masuk');
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
        Session::flush();
        Auth::logout();

        return Redirect(url('/'));
    }
}
