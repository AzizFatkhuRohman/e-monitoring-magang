<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    protected $dosen;
    public function __construct(Dosen $dosen){
        $this->dosen=$dosen;
    }
    public function Dosen(){
        $title = 'Dosen';
        $data = $this->dosen->Tampil();
        return view('admin.dosen',compact('title','data'));
    }
}
