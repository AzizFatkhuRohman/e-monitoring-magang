<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function dosen()
    {
        $title = 'Dashboard';
        return view('dosen.index', compact('title'));
    }
    public function admin()
    {
        $title = 'Dashboard';
        return view('admin.index', compact('title'));
    }
    public function departement_head()
    {
        $title = 'Dashboard';
        return view('departement-head.index', compact('title'));
    }
}
