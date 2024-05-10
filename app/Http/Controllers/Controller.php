<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Departement;
use App\Models\LogBook;
use App\Models\Mahasiswa;
use App\Models\Mentor;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // protected $mahasiswa;
    // public function __construct(Mahasiswa $mahasiswa){
    //     $this->mahasiswa = $mahasiswa;
    // }
    public function dosen()
    {
        $title = 'Dashboard';
        $mahasiswa = Mahasiswa::where('dosen_id', Auth::user()->id)->count();
        $logbook = LogBook::whereHas('mahasiswa', function ($query) {
            $query->where('dosen_id', Auth::id());
        })->count();
        $mahasiswa_id = Mahasiswa::where('dosen_id', Auth::user()->id)->get();
        $absen = 0;
        foreach ($mahasiswa_id as $id) {
            $absen += Absensi::where('mahasiswa_id', $id->id)
                ->where('keterangan', 'hadir')
                ->whereDate('created_at', Carbon::now())
                ->count();
        }
        $logbook_reject = LogBook::where('status', 'reject')->whereHas('mahasiswa', function ($query) {
            $query->where('dosen_id', Auth::id());
        })->count();
        // chart
        $dosen_id = Auth::user()->id;
        $sunter = Mahasiswa::with([
            'mentor' => function ($query) use ($dosen_id) {
                $query->whereHas('section', function ($query) use ($dosen_id) {
                    $query->where('departement_id', $dosen_id);
                });
            }
        ])
            ->whereHas('mentor.section', function ($query) use ($dosen_id) {
                $query->where('departement_id', $dosen_id);
            })
            ->whereHas('mentor.section.departement', function ($query) {
                $query->where('lokasi', 'sunter#1');
            })
            ->count();
        $krw_1 = Mahasiswa::with([
            'mentor' => function ($query) use ($dosen_id) {
                $query->whereHas('section', function ($query) use ($dosen_id) {
                    $query->where('departement_id', $dosen_id);
                });
            }
        ])
            ->whereHas('mentor.section', function ($query) use ($dosen_id) {
                $query->where('departement_id', $dosen_id);
            })
            ->whereHas('mentor.section.departement', function ($query) {
                $query->where('lokasi', 'karawang#1');
            })
            ->count();
        $krw_2 = Mahasiswa::with([
            'mentor' => function ($query) use ($dosen_id) {
                $query->whereHas('section', function ($query) use ($dosen_id) {
                    $query->where('departement_id', $dosen_id);
                });
            }
        ])
            ->whereHas('mentor.section', function ($query) use ($dosen_id) {
                $query->where('departement_id', $dosen_id);
            })
            ->whereHas('mentor.section.departement', function ($query) {
                $query->where('lokasi', 'karawang#2');
            })
            ->count();
        $krw_3 = Mahasiswa::with([
            'mentor' => function ($query) use ($dosen_id) {
                $query->whereHas('section', function ($query) use ($dosen_id) {
                    $query->where('departement_id', $dosen_id);
                });
            }
        ])
            ->whereHas('mentor.section', function ($query) use ($dosen_id) {
                $query->where('departement_id', $dosen_id);
            })
            ->whereHas('mentor.section.departement', function ($query) {
                $query->where('lokasi', 'karawang#3');
            })
            ->count();
        return view('dosen.index', compact('title', 'mahasiswa', 'logbook', 'absen', 'logbook_reject', 'sunter', 'krw_1', 'krw_2', 'krw_3'));
    }
    public function admin()
    {
        $title = 'Dashboard';
        $mahasiswa = Mahasiswa::count();
        $mentor = Mentor::count();
        $section = Section::count();
        $departement = Departement::count();
        // Chart Absensi
        $tahun = date('Y');
        $bulan = date('m');

        // Array untuk menyimpan hasil jumlah absensi setiap minggu
        $jumlahAbsensiPerMinggu = [];

        // Loop untuk setiap minggu dalam bulan ini
        for ($minggu = 1; $minggu <= 4; $minggu++) {
            // Mendapatkan tanggal awal dan akhir minggu
            $tanggalAwal = date('Y-m-d', strtotime("first day of this month + " . ($minggu - 1) . " week"));
            $tanggalAkhir = date('Y-m-d', strtotime("first day of this month + " . $minggu . " week - 1 day"));

            // Query untuk menghitung jumlah absensi dengan keterangan 'hadir' untuk minggu ini
            $jumlahAbsensi = Absensi::where('keterangan', 'hadir')
                ->whereYear('created_at', $tahun)
                ->whereMonth('created_at', $bulan)
                ->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])
                ->count();

            // Simpan jumlah absensi ke array
            $jumlahAbsensiPerMinggu["Minggu $minggu"] = $jumlahAbsensi;
        }
        $lokasi = Departement::with('mentors.students')
        ->get()
        ->map(function ($departemen) {
            return [
                'lokasi' => $departemen->nama,
                'total' => $departemen->mentors->sum(function ($mentor) {
                    return $mentor->students->count();
                })
            ];
        })
        ->pluck('total', 'lokasi');
        return view('admin.index', compact('title', 'mahasiswa', 'mentor', 
        'section', 'departement', 'jumlahAbsensiPerMinggu','lokasi'));
    }
    public function departement()
    {
        $title = 'Dashboard';

        return view('departement.index', compact('title'));
    }
}
