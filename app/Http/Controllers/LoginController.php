<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function wali_murid()
    {
        return view('components.auth.wali_murid');
    }

    public function admin()
    {
        return view('components.auth.admin');
    }

    public function store(Request $request, $level)
    {
        $kredensial = $request->only('username', 'password');

        if ($level == 'admin') {
            $checkUser = User::where('username', $request->username)->where('level', $level)->first();
        } else {
            $checkUser = User::where('username', $request->username)->where('level', $level)->first();
        }

        if (empty($checkUser)) {
            return back()->withErrors([
                'username' => 'Username atau kata sandi salah!'
            ])->onlyInput('username');
        }

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user) {
                return redirect()->intended('/')->with([
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Berhasil Masuk!'
                ]);
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Username atau kata sandi salah!'
        ])->onlyInput('username');
    }
}
