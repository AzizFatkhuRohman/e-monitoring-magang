<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function dashboardMahasiswa(){
        $title = 'Dashboard';
        return view('mahasiswa.index',compact('title'));
    }
    public function admin(){
        $title = 'Dashboard';
        return view('admin.index',compact('title'));
    }
}
