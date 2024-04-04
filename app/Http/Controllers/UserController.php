<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getProfileStudent(){
        $title = 'Profile Student';
        return view('mahasiswa.profile-student',compact('title'));
    }
    public function getStudentAccount(){
        $title = 'Student Account';
        return view('mahasiswa.student-account',compact('title'));
    }
}
