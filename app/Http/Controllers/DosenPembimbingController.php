<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenPembimbingController extends Controller
{
    public function dosen(){
        $title = 'Dosen Pembimbing';
        return view('admin.dosen-pembimbing',compact('title'));
    }
}
