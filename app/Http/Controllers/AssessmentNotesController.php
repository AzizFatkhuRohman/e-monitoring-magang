<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentNotesController extends Controller
{
    public function get(){
        $title = 'Assessment Notes';
        return view('mahasiswa.assessment-notes',compact('title'));
    }
}
