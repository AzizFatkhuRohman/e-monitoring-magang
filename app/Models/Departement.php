<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'id',
        'user_id',
        'departement',
        'lokasi'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function section()
    {
        return $this->hasMany(Section::class);
    }
    public function evaluasiEmpatBulan()
    {
        return $this->hasMany(EvaluasiEmpatBulan::class);
    }
    public function Tampil(){
        return $this->with('section')->latest()->get();
    }
    public function Tambah($data){
        return $this->create($data);
    }
    public function Ubah($data,$id){
        return $this->find($id)->update($data);
    }
    public function Hapus($id){
        return $this->find($id)->delete();
    }
}
