<?php

namespace App\Http\Controllers;

use App\Models\GrupLeader;
use App\Models\SectionHead;
use Illuminate\Http\Request;
use Validator;

class GrupLeaderController extends Controller
{
    protected $grup_leader;
    protected $section_head;
    public function __construct(GrupLeader $grup_leader, SectionHead $section_head)
    {
        $this->grup_leader = $grup_leader;
        $this->section_head = $section_head;
    }
    public function grup_leader()
    {
        $title = 'Grup Leader';
        $data= $this->grup_leader->Show();
        $data_section_head = $this->section_head->Show();
        return view('admin.grup-leader', compact('title','data','data_section_head'));
    }
    public function add_grup_leader(Request $request){
        $val = Validator::make($request->all(),[
            'nama_grup_leader'=>'required',
            'section_head'=>'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->grup_leader->Post([
            'section_head_id'=>$request->section_head,
            'nama_grup_leader'=>$request->nama_grup_leader
        ]);
        return redirect()->back()->with('create','Data Berhasil Ditambah');
    }
    public function edit_grup_leader(Request $request,$id){
        $val = Validator::make($request->all(),[
            'nama_grup_leader'=>'required',
            'section_head'=>'required'
        ]);
        if ($val->fails()) {
            return redirect('admin/grup-leader')->withErrors($val);
        }
        $this->grup_leader->Put($id,[
            'section_head_id'=>$request->section_head,
            'nama_grup_leader'=>$request->nama_grup_leader
        ]);
        return redirect('admin/grup-leader')->with('create','Data Berhasil Diubah');
    }
    public function delete_grup_leader($id){
        $this->grup_leader->Del($id);
        return redirect('admin/grup-leader')->with('delete','Data Berhasil Dihapus');
    }
}
