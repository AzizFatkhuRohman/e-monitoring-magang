<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorVokasi extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'grup_leader_id',
        'nama_mentor_vokasi',
        'alamat_email_mentor',
        'no_telp_mentor',
    ];
    public function grupLeader(){
        return $this->belongsTo(GrupLeader::class);
    }
    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }
    public function Show(){
        return $this->with('grupLeader')->latest()->get();
    }
    public function Post($data){
        return $this->create($data);
    }
    public function Put($id,$data){
        return $this->find($id)->update($data);
    }
    public function Del($id){
        return $this->find($id)->delete();
    }
}
