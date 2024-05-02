<?php

namespace App\Http\Controllers;

use App\Models\GrupLeader;
use App\Models\MentorVokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class MentorVokasiController extends Controller
{
    protected $mentor_vokasi;
    protected $grup_leader;
    protected $user;
    public function __construct(MentorVokasi $mentor_vokasi, GrupLeader $grup_leader, User $user)
    {
        $this->mentor_vokasi = $mentor_vokasi;
        $this->grup_leader = $grup_leader;
        $this->user=$user;
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
            'nomor_induk_pegawai'=>'required|unique:mentor_vokasis',
            'no_telp_mentor'=>'required',
            'nama_grup_leader'=>'required'
        ],[
            'nama_mentor.required'=>'Nama Mentor Tidak Boleh Kosong',
            'alamat_email_mentor.required'=>'Alamat Email Tidak Boleh Kosong',
            'nomor_induk_pegawai.required'=>'Nomor Induk Pegawai Tidak Boleh Kosong',
            'nomor_induk_pegawai.unique'=>'Nomor Induk Pegawai Sudah Ada',
            'nama_grup_leader.required'=>'Nama Grup Leader Tidak Boleh Kosong',
            'no_telp_mentor.required'=>'Nomor Telpon Tidak Boleh Kosong'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->mentor_vokasi->Post([
            'grup_leader_id'=>$request->nama_grup_leader,
            'nama_mentor_vokasi'=>$request->nama_mentor,
            'alamat_email_mentor'=>$request->alamat_email_mentor,
            'nomor_induk_pegawai'=>$request->nomor_induk_pegawai,
            'no_telp_mentor'=>$request->no_telp_mentor
        ]);
        $this->user->Post([
            'nama'=>$request->nama_mentor,
            'nomor_induk'=>$request->nomor_induk_pegawai,
            'email'=>$request->alamat_email_mentor,
            'password'=>bcrypt('akti123'),
            'role'=>'mentor_vokasi'
        ]);
        return redirect()->back()->with('create','Data Berhasil Ditambah');
    }
    public function edit_mentor(Request $request,$id){
        $val = Validator::make($request->all(),[
            'nama_mentor'=>'required',
            'alamat_email_mentor'=>'required',
            'no_telp_mentor'=>'required',
            'nama_grup_leader'=>'required'
        ],[
            'nama_mentor.required'=>'Nama Mentor Tidak Boleh Kosong',
            'alamat_email_mentor.required'=>'Alamat Email Tidak Boleh Kosong',
            'nama_grup_leader.required'=>'Nama Grup Leader Tidak Boleh Kosong',
            'no_telp_mentor.required'=>'Nomor Telpon Tidak Boleh Kosong'
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
