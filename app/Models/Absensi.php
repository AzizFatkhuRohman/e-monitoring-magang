<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'absensi';
    protected $fillable = [
        'mahasiswa_id',
        'keterangan',
        'deskripsi',
        'status',
        'bukti'
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function evaluasiEmpatBulan()
    {
        return $this->hasMany(EvaluasiEmpatBulan::class);
    }

}
