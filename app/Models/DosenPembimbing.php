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
}
