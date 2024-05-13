<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'user_id',
        'section_id',
        'no_telp',
        'leader'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the section that owns the mentor.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function Tampil()
    {
        return $this->with('user', 'section')->latest()->get();
    }
    public function Tambah($data)
    {
        return $this->create($data);
    }
    public function Ubah($id, $data)
    {
        return $this->find($id)->update($data);
    }
    public function Hapus($id)
    {
        return $this->find($id)->delete();
    }
}
