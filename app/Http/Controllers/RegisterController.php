<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  index()
    {
        return view('register.index');
    }

    // function store ini berfungsi untuk mengirim data inputan kedalam database
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]); // validasi data

        $validateData['password'] = bcrypt($validateData['password']); // mengubah password dari angka/huruf biasa ke bcrypt 

        User::create($validateData); // mencreate user tapi belum di login kan

        return redirect('/register')->with('success', 'Registrasi berhasil! Silahkan Login');
    }
}
