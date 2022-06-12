<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ]; // data yang akan dipakai untuk login

        // $login['password'] = bcrypt($login['password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // melogin kan user
            return redirect()->intended('dashboard'); //redirect ke dashboard
            // return redirect('dashboard')->with('success', 'Login berhasil!');
        }
        return redirect('login')->with('loginError', 'Login gagal! Silahkan coba lagi'); //jika login gagal
        
    }
}
