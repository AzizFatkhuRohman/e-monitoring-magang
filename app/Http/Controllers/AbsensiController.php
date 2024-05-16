<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    protected $absensi;
    public function __construct(Absensi $absensi) {
        $this->absensi      = $absensi;
    }
    public function absensiKehadiran() {
        return view('mahasiswa.absensi.kehadiran', [
            'data' => $this->absensi->show_by_id(),
            'tanggal' => Absensi::tanggal()
        ]);
    }

    public function post_absensiKehadiran(Request $request) {
        $this->validate($request, [
            'keterangan'    => 'required',
            'deskripsi'     => 'required',
            'status'        => 'required',
            'bukti'         => 'nullable|file|max:2048'
        ], [
            'keterangan.required'  => 'Kolom keterangan wajib diisi.',
            'deskripsi.required'   => 'Kolom deskripsi wajib diisi.',
            'status.required'      => 'Kolom status wajib diisi.',
            'bukti.max'            => 'Ukuran file terlalu besar. Maksimum 2 MB.',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $file->move(public_path('assets/img/bukti'), $file->getClientOriginalName());
            $url = $file->getClientOriginalName();
        } else {
            $url = null;
        }

        if (!Mahasiswa::where('user_id', Auth::user()->id)->exists()) {
            Alert::warning('Peringatan','Input nama Mentor Vokasi terlebih dahulu.');
            return redirect(route('logbook.mahasiswa'));
        }
        $data = $request->all();
        $data['mahasiswa_id'] = Absensi::get_id_mahasiswa() ? Absensi::get_id_mahasiswa()->id: '';
        $data['waktu'] = Absensi::tanggal();
        $data['bukti'] = $url;
        if ($this->absensi->post($data)) {
            Alert::success('Berhasil','Absensi Berhasil Diinuput!');
            return redirect()->back();
        }
    }
}
