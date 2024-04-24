<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->Masukan($request); 

        if (Auth::attempt($request->only('nik', 'password'))) {
            return redirect('/dashboard')->with('message', 'Berhasil Login');
        } else {
            return redirect('/login')->with('error', 'Nomor Induk atau Password anda Salah');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function Masukan(Request $request)
    {
        $request->validate([
            'nik'                   => 'required',
            'password'              => 'required'
        ],[
            'nik.required'          => 'Nomor Induk tidak boleh kosong!',
            'password.requiered'    => 'Password tidak boleh kosong!'
        ]);
    }
}
