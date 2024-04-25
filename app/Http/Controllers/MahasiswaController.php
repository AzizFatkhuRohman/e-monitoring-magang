<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function mahasiswa()
    {
        $title = 'Mahasiswa';
        return view('admin.mahasiswa', compact('title'));
    }
}
