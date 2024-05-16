<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use App\Models\Mentor;
use App\Models\Paraf;
use App\Models\PengajuanMentor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Faker\Factory as Faker;

class LogbookController extends Controller
{
    protected $logbook;
    protected $mahasiswa;
    protected $user;
    protected $mentor;
    protected $dosen;
    public function __construct(Logbook $logbook, Mahasiswa $mahasiswa, User $user, Mentor $mentor, Dosen $dosen)
    {
        $this->logbook = $logbook;
        $this->mahasiswa = $mahasiswa;
        $this->user = $user;
        $this->mentor = $mentor;
        $this->dosen = $dosen;
    }

    // MAHASISWA
    // LOGBOOK MINGGUAN
    public function weekly()
    {
        return view('mahasiswa.logbook.logbook', [
            'logbook' => $this->logbook->show_by_id(),
            'mahasiswa' => $this->mahasiswa->show(),
            'mentor' => Mentor::all(),
            'week' => Mahasiswa::week(),
            'mounth' => Mahasiswa::mounth(),
            'no' => 1,
            'dosen' => $this->dosen->Tampil()
        ]);
    }

    public function weekly_add_mentor(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'dosen_id' => 'required',
            'mentor_id' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        if ($this->mahasiswa->post($data)) {
            Alert::success('success', 'Data Berhasil Di Tambahkan!');
            return redirect()->back();
        }
    }

    public function weekly_add(Request $request)
    {
        $this->validate($request, [
            'mahasiswa_id' => 'required',
            'self_evaluation' => 'required',
            'noreg_vokasi' => 'required|numeric',
            'batch' => 'required|numeric',
            'divisi' => 'required',
            'shop' => 'required',
            'line' => 'required',
            'keterangan' => 'required',
            'shift' => 'required',
        ]);
        if ($this->logbook->post($request->except('__token'))) {
            Alert::success('success', 'Data Berhasil Di Tambahkan!');
            return redirect()->back();
        }
    }

    public function weekly_put(Request $request, $id)
    {
        $this->validate($request, [
            'noreg_vokasi' => 'required|numeric',
            'batch' => 'required|numeric',
            'self_evaluation' => 'required',
            'divisi' => 'required',
            'shop' => 'required',
            'line' => 'required',
            'pos' => 'required',
            'shift' => 'required',
        ]);

        if ($this->logbook->put($id, $request->all())) {
            Alert::success('success', 'Data Berhasil Di Ubah!');
            return redirect()->back();
        }
    }

    // LOGBOOK /4 BULAN
    public function evaluasi()
    {
        return view('mahasiswa.logbook.evaluasi', ['faker' => Faker::create()]);
    }

    // END LOGBOOK
    public function pdf()
    {
        return view('pdf');
    }

    // END MAHASISWA

    // MENTOR

    // DASHBOARD
    // Logbook Mahasiswa
    public function mentor_weekly()
    {
        confirmDelete("Reject Data", "Apakah anda yakin reject Logbook?");
        return view('mentor.logbook', [
            'mentor' => $this->mentor->show(),
            'paraf' => Paraf::show(),
            'logbook' => $this->logbook->show_by_mentor(),
        ]);
    }

    public function mentor_weekly_put(Request $request, $id)
    {
        $this->validate($request, [
            'tool_used' => 'required',
            'safety_key_point' => 'required',
            'problem_solf' => 'required',
            'hyarihatto' => 'required',
            'mentor_eveluation' => 'required',
            'point_to_remember' => 'required',
            'komentar_mentor' => 'required',
            'paraf' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        if ($request->hasFile('paraf')) {
            $file = $request->file('paraf');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/paraf/'), $fileName);

            $paraf = ['mentor_id' => $this->mentor->show()->value('id'), 'ttd' => $fileName];
            if (Paraf::show()->isEmpty()) {
                Paraf::create($paraf);
            } else {
                Paraf::put(Paraf::show()->value('id'), ['ttd' => $fileName]);
            }
        }

        $data = $request->all();
        $data['status'] = 'accept';

        if ($this->logbook->put($id, $data)) {
            Alert::success('success', 'Data Berhasil Di Tambah!');
        }
        return redirect()->back();
    }
    public function mentor_weekly_delete($id)
    {
        if ($this->logbook->reject($id, ['status' => 'reject'])) {
            Alert::success('success', 'Data Berhasil Di Reject!');
            return redirect()->back();
        }
    }

    // DATA
    // PENGAJUAN MENTOR
    public function pengajuan_mentor(Request $request)
    {
        if ($request->has('button_accept')) {
            $this->validate($request, [
                'status' => 'required',
                'id' => 'required'
            ]);
            PengajuanMentor::find($request->id)->update($request->all());
            $this->mahasiswa->Put(PengajuanMentor::where('id', $request->id)->value('mahasiswa_id'), [
                'mentor_id' => PengajuanMentor::where('id', $request->id)->value('mentor_kedua')
            ]);
            Alert::success('Berhasil', 'Data Berhasil Di Accept!');
            return redirect()->back();
        }
        if ($request->has('button_reject')) {
            $this->validate($request, [
                'status' => 'required',
                'id' => 'required'
            ]);
            PengajuanMentor::find($request->id)->update($request->all());
            Alert::success('Berhasil', 'Data Berhasil Di Accept!');
            return redirect()->back();
        }
        return view('mentor.data.pengajuan_mentor', [
            'pengajuan_mentor' => PengajuanMentor::show_by_id_mentor()
        ]);
    }

    // LIST MAHASISWA
    public function list_mahasiswa()
    {
        return view('mentor.data.list_mahasiswa', ['mentor' => $this->mahasiswa->list_mahasiswa()]);
    }
    // END MENTOR
}
