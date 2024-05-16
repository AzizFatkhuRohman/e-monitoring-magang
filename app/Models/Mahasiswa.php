<?php

namespace App\Models;

use DateTime;
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
        'dosen_id',
        'mentor_id',
        'noreg_vokasi',
        'nim',
        'batch',
        'divisi',
        'shop',
        'line',
        'pos',
        'shift'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
    public function logbook()
    {
        return $this->hasMany(Logbook::class);
    }
    public function Tampil()
    {
        return $this->with('user', 'dosen', 'mentor', 'absensi')->latest()->get();
    }
    public function WhereDept()
    {
        $departemen_id = Auth::user()->id;

        // Ambil data mahasiswa yang memiliki relasi dengan departemen yang sedang login
        return $this->with([
            'mentor' => function ($query) use ($departemen_id) {
                $query->whereHas('section', function ($query) use ($departemen_id) {
                    $query->where('departement_id', $departemen_id);
                });
            },
            'absensi'
        ])
            ->latest()
            ->get();
    }
    public function WhereDosen($id)
    {
        return $this->with('user', 'mentor')->where('dosen_id', $id)->latest()->get();
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
    public function Batch()
    {
        return $this->distinct()->pluck('batch');
    }
    public function Detail($id)
    {
        return $this->with('logbook', 'absensi')->find($id);
    }
    public function date()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime();
        return $date->format('Y/m/d');
    }

    public static function week()
    {
        $object = new self();
        $month = date("n", strtotime($object->date()));
        $year = date("Y", strtotime($object->date()));
        $week = date("W", strtotime($object->date()));
        $start_month = date("W", strtotime("{$year}-{$month}-01"));
        return $week - $start_month + 1;
    }

    public static function mounth()
    {
        $object = new self();
        $date = new DateTime($object->date());
        return $date->format('F');
    }
    public function show()
    {
        return $this->with('mentor', 'mentor.user')->where('user_id', Auth::user()->id)->latest()->get();
    }

    public function list_mahasiswa()
    {
        return self::with(['mentor.user', 'user'])->whereHas('mentor.user', function ($query) {
            $query->where('id', Auth::user()->id);
        })->latest()->get();
    }

    public function post($data)
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

}
