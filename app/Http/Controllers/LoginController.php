<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if ($user = Auth::user()) {
            if($user->roles_id == '1') {
                return redirect()->intended('/');
            }elseif ($user->roles_id == '2') {
                return redirect()->intended('transaksi');
            }
        }
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request) {
        // dd($request);
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong!',
                'password.required' => 'Password tidak boleh kosong!'
            ]
        );
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->roles_id == '1') {
                return redirect()->intended('/');
            }elseif ($user->roles_id == '2') {
                return redirect()->intended('transaksi');
            }
            return redirect()->intended('/');
        }
        return back()->with('loginError', 'Login failed!');

    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
