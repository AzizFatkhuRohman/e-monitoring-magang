<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'logbook';
    protected $fillable = [
        'mahasiswa_id',
        'week',
        'mounth',
        'gambar',
        'keterangan',
        'tool_used',
        'safety_key_point',
        'problem_solf',
        'hyarihatto',
        'point_to_remember',
        'self_evaluation',
        'komentar_mentor',
        'status',
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
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
