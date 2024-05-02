<?php

namespace App\Http\Controllers;

use App\Models\DepartementHead;
use App\Models\Section;
use App\Models\SectionHead;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class SectionHeadController extends Controller
{
    protected $section_head;
    protected $section;
    protected $departement_head;
    protected $user;
    public function __construct(SectionHead $section_head, Section $section, DepartementHead $departement_head,User $user)
    {
        $this->section_head = $section_head;
        $this->section = $section;
        $this->departement_head = $departement_head;
        $this->user=$user;
    }
    public function section_head()
    {
        $title = 'Section Head';
        $data = $this->section_head->Show();
        $data_section = $this->section->Show();
        $data_departement_head = $this->departement_head->Show();
        return view('admin.section.section-head', compact('title', 'data', 'data_section', 'data_departement_head'));
    }
    public function add_section_head(Request $request)
    {
        $val = Validator::make($request->all(), [
            'nama_section_head' => 'required',
            'nomor_induk_pegawai'=>'required|unique:section_heads',
            'section' => 'required',
            'nama_departement_head' => 'required'
        ],[
            'nama_section_head.required'=>'Nama Section Head Tidak Boleh Kosong',
            'nomor_induk_pegawai.required'=>'Nomor Induk Pegawai Tidak Boleh Kosong',
            'nomor_induk_pegawai.unique'=>'Nomor Induk Pegawai Sudah Ada',
            'section'=>'Section Tidak Boleh Kosong',
            'nama_departement_head.required'=>'Nama Departement Head Tidak Boleh Kosong'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->section_head->Post([
            'nama_section_head' => $request->nama_section_head,
            'nomor_induk_pegawai'=>$request->nomor_induk_pegawai,
            'section_id' => $request->section,
            'departement_head_id' => $request->nama_departement_head
        ]);
        $this->user->Post([
            'nama'=>$request->nama_section_head,
            'nomor_induk'=>$request->nomor_induk_pegawai,
            'password'=>bcrypt('akti123'),
            'role'=>'section_head'
        ]);
        return redirect()->back()->with('create', 'Data Berhasil Ditambahkan');
    }
    public function edit_section_head(Request $request,$id)
    {
        $val = Validator::make($request->all(), [
            'nama_section_head' => 'required',
            'section' => 'required',
            'nama_departement_head' => 'required'
        ],[
            'nama_section_head.required'=>'Nama Section Head Tidak Boleh Kosong',
            'section'=>'Section Tidak Boleh Kosong',
            'nama_departement_head.required'=>'Nama Departement Head Tidak Boleh Kosong'
        ]);
        if ($val->fails()) {
            return redirect('admin/section-head')->withErrors($val);
        }
        $this->section_head->Put($id,[
            'nama_section_head' => $request->nama_section_head,
            'section_id' => $request->section,
            'departement_head_id' => $request->nama_departement_head
        ]);
        return redirect('admin/section-head')->with('update', 'Data Berhasil Diubah');
    }
    public function delete_section_head($id){
        $this->section_head->Del($id);
        return redirect('admin/section-head')->with('delete','Data Berhasil Dihapus');
    }
}
