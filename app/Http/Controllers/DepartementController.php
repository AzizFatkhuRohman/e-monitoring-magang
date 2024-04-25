<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Validator;

class DepartementController extends Controller
{
    protected $departement;
    public function __construct(Departement $departement)
    {
        $this->departement = $departement;
    }
    public function departement()
    {
        $title = 'Departement';
        $data = $this->departement->Show();
        return view('admin.departement', compact('title','data'));
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
        $val = Validator::make($request->all(), [
            'departement' => 'required|unique:departements'
        ], [
            'departement.required' => 'Departement Tidak Boleh Kosong',
            'departement.unique' => 'Departement Sudah Ada'
        ]);
        if ($val->fails()) {
            return redirect('admin/departement')->withErrors($val);
        }
        $this->departement->Put($id,[
            'departement' => $request->departement
        ]);
        return redirect('admin/departement')->with('update', 'Data Berhasil Diubah');
    }
    public function delete_departement($id){
        $this->departement->Del($id);
        return redirect('admin/departement')->with('delete', 'Data Berhasil Dihapus');
    }
}
