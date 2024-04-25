<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Validator;

class SectionController extends Controller
{
    protected $section;
    public function __construct(Section $section){
        $this->section=$section;
    }
    public function section(){
        $title = 'Section';
        $data = $this->section->Show();
        return view('admin.section',compact('title','data'));
    }
    public function add_section(Request $request){
        $val = Validator::make($request->all(),[
            'section'=>'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->section->Post([
            'section'=>$request->section
        ]);
        return redirect()->back()->with('create','Data Berhasil Ditambah');
    }
    public function edit_section($id, Request $request){
        $val = Validator::make($request->all(),[
            'section'=>'required'
        ]);
        if ($val->fails()) {
            return redirect('admin/section')->withErrors($val);
        }
        $this->section->Put($id,[
            'section'=>$request->section
        ]);
        return redirect('admin/section')->with('update','Data Berhasil Diubah');
    }
    public function delete_section($id){
        $this->section->Del($id);
        return redirect('admin/section')->with('delete','Data Berhasil Dihapus');
    }
}
