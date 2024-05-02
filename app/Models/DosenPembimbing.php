<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPembimbing extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'nama_dosen',
        'nomor_induk_pegawai',
        'gelar',
        'status'
    ];
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function Post($data)
    {
        return $this->create($data);
    }
    public function Show(){
        return $this->latest()->get();
    }
    public function Put($id,$data){
        return $this->find($id)->update($data);
    }
    public function Del($id){
        return $this->find($id)->delete();
    }
}
