<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mahasiswa extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'dosen_pembimbing_id',
        'mentor_vokasi_id',
        'nama_mahasiswa',
        'nomor_induk_mahasiswa',
        'no_registrasi_vokasi',
        'batch_vokasi',
        'shop',
        'divisi',
        'line',
        'pos',
        'shift'
    ];
    public function mentorVokasi()
    {
        return $this->belongsTo(MentorVokasi::class);
    }
    public function dosenPembimbing()
    {
        return $this->belongsTo(DosenPembimbing::class);
    }
    public function Show()
    {
        return $this->with('mentorVokasi', 'dosenPembimbing')->latest()->get();
    }
    public function Post($data)
    {
        return $this->create($data);
    }
    public function Put($id, $data)
    {
        return $this->find($id)->update($data);
    }
    public function Del($id)
    {
        return $this->find($id)->delete();
    }
    public function WhereDosen($no)
    {
        return $this->with('dosenPembimbing')->whereHas('dosenPembimbing', function ($query) use ($no) {
            $query->where('nomor_induk_pegawai', $no);
        })->get();
    }
    public function WhereDept()
    {
        $deptNo = Auth::user()->nomor_induk;
        $mentor = MentorVokasi::whereHas('grupLeader.sectionHead.departementHead', function ($query) use ($deptNo) {
            $query->where('nomor_induk_pegawai', $deptNo);
        })->latest()->first();
        return $mentor->mahasiswa()->latest()->get();
    }
}
