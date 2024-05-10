<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public function Tampil(){
        return $this->with('user','mentor','absensi')->latest()->get();
    }
    public function WhereDept(){
        $departemen_id = Auth::user()->id;

    // Ambil data mahasiswa yang memiliki relasi dengan departemen yang sedang login
    return $this->with(['mentor' => function($query) use ($departemen_id) {
                        $query->whereHas('section', function($query) use ($departemen_id) {
                            $query->where('departement_id', $departemen_id);
                        });
                    }, 'absensi'])
                ->latest()
                ->get();
    }
    public function WhereDosen(){
        return $this->with('user','mentor','absensi')->where('dosen_id',Auth::user()->id)->latest()->get();
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
    public function Batch(){
        return $this->distinct()->pluck('batch');
    }

}
