<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogbookController extends Controller
{
    public function get(){
        $title = 'Logbook';
        return view('mahasiswa.logbook',compact('title'));
    }
}
