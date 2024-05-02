<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\DepartementHead;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class DepartementHeadController extends Controller
{
    protected $departement;
    protected $departement_head;
    protected $user;
    public function __construct(Departement $departement, DepartementHead $departement_head, User $user){
        $this->departement=$departement;
        $this->departement_head=$departement_head;
        $this->user=$user;
    }
    public function departement_head(){
        $title = 'Departement Head';
        $departement = $this->departement->Show();
        $data = $this->departement_head->Show();
        return view('admin.departement.departement-head',compact('title','departement','data'));
    }
    public function add_departement_head(Request $request){
        $val = Validator::make($request->all(),[
            'nama_departement_head'=>'required',
            'nomor_induk_pegawai'=>'required|unique:departement_heads',
            'departement'=>'required',
            'lokasi'=>'required'
        ],[
            'nama_departement_head.required'=>'Nama Departement Head Tidak Boleh Kosong',
            'nomor_induk_pegawai.required'=>'Nomor Induk Pegawai Tidak Boleh Kosong',
            'nomor_induk_pegawai.unique'=>'Nomor Induk Pegawai Sudah Ada',
            'departement.required'=>'Departement Tidak Boleh Kosong',
            'lokasi.required'=>'Lokasi Tidak Boleh Kosong'
        ]);
        if($val->fails()){
            return redirect()->back()->withErrors($val);
        }
        $this->departement_head->Add([
            'departement_id'=>$request->departement,
            'nama_departement_head'=>$request->nama_departement_head,
            'nomor_induk_pegawai'=>$request->nomor_induk_pegawai,
            'lokasi'=>$request->lokasi
        ]);
        $this->user->Post([
            'nama'=>$request->nama_departement_head,
            'nomor_induk'=>$request->nomor_induk_pegawai,
            'password'=>bcrypt('akti123'),
            'role'=>'departement_head'
        ]);
        return redirect()->back()->with('create','Data Berhasil Ditambahkan');
    }
    public function edit_departement_head(Request $request, $id){
        $val = Validator::make($request->all(),[
            'nama_departement_head'=>'required',
            'departement'=>'required',
            'lokasi'=>'required'
        ],[
            'nama_departement_head.required'=>'Nama Departement Head Tidak Boleh Kosong',
            'departement.required'=>'Departement Tidak Boleh Kosong',
            'lokasi.required'=>'Lokasi Tidak Boleh Kosong'
        ]);
        if($val->fails()){
            return redirect('admin/departement-head')->withErrors($val);
        }
        $this->departement_head->Put($id,[
            'departement_id'=>$request->departement,
            'nama_departement_head'=>$request->nama_departement_head,
            'lokasi'=>$request->lokasi
        ]);
        return redirect('admin/departement-head')->with('create','Data Berhasil Ditambahkan');
    }
    public function delete_departement_head($id){
        $this->departement_head->Del($id);
        return redirect('admin/departement-head')->with('delete','Data Berhasil Dihapus');
    }
}
