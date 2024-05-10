<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    protected $mentor;
    public function __construct(Mentor $mentor){
        $this->mentor=$mentor;
    }
    public function Mentor(){
        $title = 'Mentor';
        $data = $this->mentor->Tampil();
        return view('admin.mentor',compact('title','data'));
    }
}
