<?php

namespace App\Http\Controllers;

use App\Models\DosenPembimbing;
use App\Models\Mahasiswa;
use App\Models\MentorVokasi;
use App\Models\User;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class MahasiswaController extends Controller
{
    protected $mentor_vokasi;
    protected $dosen;
    protected $mahasiswa;
    protected $user;
    public function __construct(MentorVokasi $mentor_vokasi, DosenPembimbing $dosen, Mahasiswa $mahasiswa,User $user)
    {
        $this->mentor_vokasi = $mentor_vokasi;
        $this->dosen = $dosen;
        $this->mahasiswa = $mahasiswa;
        $this->user=$user;
    }
    public function mahasiswa()
    {
        $title = 'Mahasiswa';
        $mentor = $this->mentor_vokasi->Show();
        $dosen = $this->dosen->Show();
        $data = $this->mahasiswa->Show();
        return view('admin.mahasiswa', compact('title', 'mentor', 'dosen','data'));
    }
    public function add_mahasiswa(Request $request)
    {
        $val = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required',
            'batch_vokasi'=>'required',
            'shop' => 'required',
            'divisi' => 'required',
            'line' => 'required',
            'pos' => 'required',
            'shift' => 'required'
        ],[
            'nama_mahasiswa.required' => 'Nama Mahasiswa Tidak Boleh Kosong',
            'batch_vokasi.required'=>'Batch Vokasi Tidak Boleh Kosong',
            'shop.required' => 'Shop Tidak Boleh Kosong',
            'divisi.required' => 'Divisi Tidak Boleh Kosong',
            'line.required' => 'Line Tidak Boleh Kosong',
            'pos.required' => 'Pos Tidak Boleh Kosong',
            'shift.required' => 'Shift Tidak Boleh Kosong'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->mahasiswa->Post([
            'dosen_pembimbing_id' => $request->dosen_pembimbing,
            'mentor_vokasi_id' => $request->nama_mentor,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nomor_induk_mahasiswa' => $request->nomor_induk_mahasiswa,
            'no_registrasi_vokasi' => $request->no_registrasi_vokasi,
            'batch_vokasi'=>$request->batch_vokasi,
            'shop' => $request->shop,
            'divisi' => $request->divisi,
            'line' => $request->line,
            'pos' => $request->pos,
            'shift' => $request->shift
        ]);
        $this->user->Post([
            'nama'=>$request->nama_mahasiswa,
            'nomor_induk'=>$request->nomor_induk_mahasiswa,
            'password'=>bcrypt('akti123'),
            'role'=>'mahasiswa'
        ]);
        return redirect()->back()->with('create', 'Data Berhasil Ditambahkan');
    }
    public function edit_mahasiswa(Request $request,$id)
    {
        $val = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required',
            'batch_vokasi'=>'required',
            'shop' => 'required',
            'divisi' => 'required',
            'line' => 'required',
            'pos' => 'required',
            'shift' => 'required'
        ],[
            'nama_mahasiswa.required' => 'Nama Mahasiswa Tidak Boleh Kosong',
            'batch_vokasi.required' => 'Batch Vokasi Tidak Boleh Kosong',
            'shop.required' => 'Shop Tidak Boleh Kosong',
            'divisi.required' => 'Divisi Tidak Boleh Kosong',
            'line.required' => 'Line Tidak Boleh Kosong',
            'pos.required' => 'Pos Tidak Boleh Kosong',
            'shift.required' => 'Shift Tidak Boleh Kosong'
        ]);
        if ($val->fails()) {
            return redirect('admin/mahasiswa')->withErrors($val);
        }
        $this->mahasiswa->Put($id,[
            'dosen_pembimbing_id' => $request->dosen_pembimbing,
            'mentor_vokasi_id' => $request->nama_mentor,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'batch_vokasi'=>$request->batch_vokasi,
            'shop' => $request->shop,
            'divisi' => $request->divisi,
            'line' => $request->line,
            'pos' => $request->pos,
            'shift' => $request->shift
        ]);
        return redirect('admin/mahasiswa')->with('create','Data Berhasil Diubah');
    }
    public function mhsfordsn(){
        $title = 'Mahasiswa';
        $no = Auth::user()->nomor_induk;
        $data = $this->mahasiswa->WhereDosen($no);
        return view('dosen.mahasiswa',compact('title','data'));
    }
    public function mhsfordept(){
        $title = 'Mahasiswa';
        $data = $this->mahasiswa->WhereDept();
        return view('departement-head.mahasiswa',compact('title','data'));
    }
}
