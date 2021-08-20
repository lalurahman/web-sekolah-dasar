<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required'
        ]);

        $data_login = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        Auth::attempt($data_login);

        if (Auth::check()) {
            if (Auth::user()->roles == 'siswa') {
                return redirect()->route('dashboard-siswa');
            } else if(Auth::user()->roles == 'admin') {
                return redirect()->route('dashboard-admin');
            } else if(Auth::user()->roles == 'guru'){
                return redirect()->route('dashboard-guru');
            } else if(Auth::user()->roles == 'staff') {
                return redirect()->route('dashboard-staff');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login')->with('success','Telah berhasil keluar!');
    }
}
