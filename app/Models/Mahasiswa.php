<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'user_id',
        'mentor_id',
        'noreg_vokasi',
        'batch',
        'divisi',
        'shop',
        'line',
        'pos',
        'shift'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
    public function logbook()
    {
        return $this->hasMany(Logbook::class);
    }

}
