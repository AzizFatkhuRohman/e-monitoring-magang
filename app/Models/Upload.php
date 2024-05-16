<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Upload extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'mahasiswa_id',
        'presentasi_final',
        'laporan_ta',
        'report_a3',
        'sertifikat',
    ];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function show() {
        return $this->with('mahasiswa')->latest()->get();
    }

    public function show_by_id() {
        $user_id = Auth::user()->id;
        return Upload::whereHas('mahasiswa.user', function ($query) use ($user_id) {
            $query->where('id', $user_id);
        })->with('mahasiswa.user')->latest()->get();
    }

    public function post($data) {
        return $this->create($data);
    }
    public function put($id, $data)
    {
        return $this->find($id)->update($data);
    }
}
