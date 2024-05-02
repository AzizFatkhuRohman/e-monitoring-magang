<?php

namespace App\Http\Controllers;

use App\Models\DosenPembimbing;
use Illuminate\Http\Request;
use Validator;

class DosenPembimbingController extends Controller
{
    protected $dosen;
    public function __construct(DosenPembimbing $dosen)
    {
        $this->dosen = $dosen;
    }
    public function dosen()
    {
        $title = 'Dosen Pembimbing';
        $data = $this->dosen->Show();
        return view('admin.dosen-pembimbing', compact('title', 'data'));
    }
    public function add_dosen(Request $request)
    {
        $val = Validator::make($request->all(), [
            'nama_dosen' => 'required',
            'nomor_induk_pegawai' => 'required|unique:dosen_pembimbings',
            'gelar' => 'required',
            'status' => 'required'
        ], [
            'nama_dosen.required' => 'Nama Dosen Tidak Boleh Kosong',
            'nomor_induk_pegawai.required' => 'Nomor Induk Pegawai Tidak Boleh Kosong',
            'nomor_induk_pegawai.unique' => 'Nomor Induk Pegawai Sudah Ada',
            'gelar.required' => 'Gelar Tidak Boleh Kosong',
            'status.required' => 'Status Tidak Boleh Kosong'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->dosen->Post(
            [
                'nama_dosen' => $request->nama_dosen,
                'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
                'gelar' => $request->gelar,
                'status' => $request->status
            ]
        );
        return redirect()->back()->with('create', 'Data Berhasil Ditambah');
    }
    public function edit_dosen(Request $request, $id)
    {
        $val = Validator::make($request->all(), [
            'nama_dosen' => 'required',
            'gelar' => 'required',
            'status' => 'required'
        ], [
            'nama_dosen.required' => 'Nama Dosen Tidak Boleh Kosong',
            'nomor_induk_pegawai.required' => 'Nomor Induk Pegawai Tidak Boleh Kosong',
            'gelar.required' => 'Gelar Tidak Boleh Kosong',
            'status.required' => 'Status Tidak Boleh Kosong'
        ]);
        if ($val->fails()) {
            return redirect('admin/dosen-pembimbing')->withErrors($val);
        }
        $this->dosen->Put(
            $id,
            [
                'nama_dosen' => $request->nama_dosen,
                'gelar' => $request->gelar,
                'status' => $request->status
            ]
        );
        return redirect('admin/dosen-pembimbing')->with('update', 'Data Berhasil Diubah');
    }
    public function delete_dosen($id){
        $this->dosen->Del($id);
        return redirect('admin/dosen-pembimbing')->with('delete','Data berhasil Dihapus');
    }
}
