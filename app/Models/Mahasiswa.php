<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory,HasUuids;
    protected $fillable=[
        'mentor_vokasi_id',
        'nama_mahasiswa',
        'nomor_induk_mahasiswa',
        'no_registrasi_vokasi',
        'shop',
        'divisi',
        'line',
        'pos',
        'shift'
    ];
    public function mentorVokasi(){
        return $this->belongsTo(MentorVokasi::class);
    }
    public function dosenPembimbing(){
        return $this->hasOne(DosenPembimbing::class);
    }
}
