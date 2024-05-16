<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Logbook extends Model
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
    public function Tambah($data)
    {
        return $this->create($data);
    }
    public function Ubah($data, $id)
    {
        return $this->find($id)->update($data);
    }
    public function Hapus($id)
    {
        return $this->find($id)->delete();
    }
    public function show()
    {
        return $this->with('mahasiswa.mentor.user')->whereHas('mahasiswa.user')->latest()->get();
    }

    public function show_by_id()
    {
        $user_id = Auth::user()->id;
        return Logbook::whereHas('mahasiswa.user', function ($query) use ($user_id) {
            $query->where('id', $user_id); })->with('mahasiswa.user')->latest()->get();
    }

    public function show_by_mentor()
    {
        $user_id = Auth::user()->id;
        return Logbook::whereHas('mahasiswa.mentor', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->with('mahasiswa.mentor.user')->latest()->get();
    }

    public function post($data)
    {
        return $this->create($data);
    }

    public function put($id, $data)
    {
        return $this->find($id)->update($data);
    }
    public function reject($id, $data)
    {
        return $this->find($id)->update($data);
    }

}
