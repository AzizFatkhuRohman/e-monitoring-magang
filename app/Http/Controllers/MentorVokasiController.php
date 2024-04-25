<?php

namespace App\Http\Controllers;

use App\Models\GrupLeader;
use App\Models\MentorVokasi;
use Illuminate\Http\Request;
use Validator;

class MentorVokasiController extends Controller
{
    protected $mentor_vokasi;
    protected $grup_leader;
    public function __construct(MentorVokasi $mentor_vokasi, GrupLeader $grup_leader)
    {
        $this->mentor_vokasi = $mentor_vokasi;
        $this->grup_leader = $grup_leader;
    }
    public function mentor()
    {
        $title = 'Mentor Vokasi';
        $data = $this->mentor_vokasi->Show();
        $data_grup_leader=$this->grup_leader->Show();
        return view('admin.mentor-vokasi', compact('title','data','data_grup_leader'));
    }
    public function add_mentor(Request $request){
        $val = Validator::make($request->all(),[
            'nama_mentor'=>'required',
            'alamat_email_mentor'=>'required',
            'no_telp_mentor'=>'required',
            'nama_grup_leader'=>'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->mentor_vokasi->Post([
            'grup_leader_id'=>$request->nama_grup_leader,
            'nama_mentor_vokasi'=>$request->nama_mentor,
            'alamat_email_mentor'=>$request->alamat_email_mentor,
            'no_telp_mentor'=>$request->no_telp_mentor
        ]);
        return redirect()->back()->with('create','Data Berhasil Ditambah');
    }
    public function edit_mentor(Request $request,$id){
        $val = Validator::make($request->all(),[
            'nama_mentor'=>'required',
            'alamat_email_mentor'=>'required',
            'no_telp_mentor'=>'required',
            'nama_grup_leader'=>'required'
        ]);
        if ($val->fails()) {
            return redirect('admin/mentor-vokasi')->withErrors($val);
        }
        $this->mentor_vokasi->Put($id,[
            'grup_leader_id'=>$request->nama_grup_leader,
            'nama_mentor_vokasi'=>$request->nama_mentor,
            'alamat_email_mentor'=>$request->alamat_email_mentor,
            'no_telp_mentor'=>$request->no_telp_mentor
        ]);
        return redirect('admin/mentor-vokasi')->with('update','Data Berhasil Diubah');
    }
    public function delete_mentor($id){
        $this->mentor_vokasi->Del($id);
        return redirect('admin/mentor-vokasi')->with('delete','Data Berhasil Dihapus');
    }
}
