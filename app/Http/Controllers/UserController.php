<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['nomor_induk' => $request->nomor_induk, 'password' => $request->password])) {
            // Periksa peran pengguna setelah berhasil login
            if (Auth::user()->role == 'admin') {
                // Jika peran adalah 'admin', redirect ke dashboard admin
                return redirect()->intended('/admin/dashboard');
            } elseif (Auth::user()->role == 'dosen') {
                // Jika peran adalah 'user', redirect ke dashboard user
                return redirect()->intended('/dosen/dashboard');
            } elseif (Auth::user()->role == 'departement_head') {
                // Jika peran adalah 'user', redirect ke dashboard user
                return redirect()->intended('/departement-head/dashboard');
            }
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
        return back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function pengguna()
    {
        $title = 'Manajemen Pengguna';
        $data = $this->user->Show();
        return view('admin.pengguna', compact('title', 'data'));
    }
}
