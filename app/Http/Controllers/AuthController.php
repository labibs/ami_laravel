<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }
  public function postlogin(Request $request)
    {
        // Menyimpan nilai dari input 'remember' yang diterima dari formulir
        $remember = $request->has('remember') ? true : false;
    
        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $user = auth()->user(); // Mendapatkan objek user yang sedang masuk
        
            // Periksa nilai kolom 'karyawan' dari user yang sedang masuk
            if ($user->karyawan == 'No') {
                Auth::logout(); // Logout pengguna
                return redirect('/login')->with('notifikasi', 'Anda tidak memiliki akses.'); // Redirect kembali ke halaman login dengan pesan kesalahan
            } else {
                return redirect('/karyawan/' . $user->id . '/dashboard_baru'); // Redirect ke halaman dashboard jika karyawan Ya
            }
        } else {
            // Jika email atau password tidak sesuai, kembalikan ke halaman login
            return redirect('/login')->withInput($request->only('email', 'remember'))->with('notifikasi', 'Email atau password salah.');
        }  
        return redirect('/login');
    }

  public function logout()
  {
    Auth::logout();
    return redirect('/login');
  }
}