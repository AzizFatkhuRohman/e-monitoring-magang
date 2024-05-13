<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class DepartementController extends Controller
{
    protected $departement;
    protected $user;
    public function __construct(Departement $departement, User $user)
    {
        $this->departement = $departement;
        $this->user=$user;
    }
    public function departement()
    {
        $title = 'Departement';
        $data = $this->departement->Tampil();
        return view('admin.departement.index', compact('title','data'));
    }
    public function add_departement(Request $request)
    {
        $val = Validator::make($request->all(), [
            'departement' => 'required|unique:departements'
        ], [
            'departement.required' => 'Departement Tidak Boleh Kosong',
            'departement.unique' => 'Departement Sudah Ada'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        $this->departement->Post([
            'departement' => $request->departement
        ]);
        return redirect()->back()->with('create', 'Data Berhasil Ditambahkan');
    }
    public function edit_departement($id, Request $request){
        $user_id = $request->user_id;
        $this->user->Ubah($user_id,[
            'nama'=>$request->nama
        ]);
        $this->departement->Ubah($id,[
            'departement' => $request->departement
        ]);
        return redirect('admin/departement')->with('update', 'Data Berhasil Diubah');
    }
    public function delete_departement($id){
        $this->departement->Hapus($id);
        return redirect('admin/departement')->with('delete', 'Data Berhasil Dihapus');
    }
    public function detail_departement($id){
        $title = 'Departement';
        return view('admin.departement.detail',compact('title'));
    }
}
