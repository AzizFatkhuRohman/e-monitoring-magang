<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Mentor;
use App\Models\PengajuanMentor;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    protected $mentor;
    protected $mahasiswa;
    protected $user;
    public function __construct(Mentor $mentor, Mahasiswa $mahasiswa, User $user)
    {
        $this->mentor = $mentor;
        $this->mahasiswa = $mahasiswa;
        $this->user = $user;
    }
    // mahasiswa
    public function mahasiswa()
    {
        return view('mahasiswa.dashboard');
    }

    public function mahasiswaProfile()
    {
        return view('mahasiswa.profile', [
            'data' => $this->mahasiswa->show(),
            'faker' => Faker::create(),
            'mentor' => $this->mentor->showAll(),
            'pengajuan_mentor' => PengajuanMentor::show_by_id_mahasiswa()
        ]);
    }

    public function mahasiswaProfileEdit(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:60',
            'password_lama' => 'nullable|max:60',
            'password' => 'nullable|max:60',
            'repassword' => 'nullable|max:60|same:password',
            'no_telp' => 'required|max:60',
            'alamat' => 'required|max:60',
            'foto_profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'foto_profile.image' => 'Kolom foto profil harus berupa gambar.',
            'foto_profile.mimes' => 'Format gambar yang diterima adalah jpeg, png, jpg, gif, atau svg.',
            'foto_profile.max' => 'Ukuran gambar tidak boleh melebihi 2048 kilobit (2MB).',
            'repassword.same' => 'Konfirmasi password tidak cocok dengan password baru.'
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->password_lama, Auth::user()->password)) {
                return redirect()->back()->withErrors('Password lama tidak sesuai.');
            }
        }
        if ($request->filled('password')) {
            Auth::user()->password = Hash::make($request->password);
        }

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/profile/'), $fileName);
            $user->foto_profile = $fileName;
        }
        if ($user->save()) {
            Alert::success('Berhasil', 'Profile berhasil diupdate!');
        } else {
            Alert::error('Gagal', 'Gagal mengupdate profile.');
        }

        return redirect()->back();
    }

    public function pengajuanMentor(Request $request)
    {
        $this->validate($request, [
            'mentor_pertama' => 'required',
            'mentor_kedua' => 'required',
        ]);
        $data = $request->all();
        $data['mahasiswa_id'] = Mahasiswa::where('user_id', Auth::user()->id)->value('id');
        if (PengajuanMentor::post($data)) {
            Alert::success('Berhasil', 'Pengajuan mentor berhasil dikirim!');
            return redirect()->back();
        }
    }


    // mentor
    public function mentor()
    {
        return view('mentor.dashboard', ['data' => $this->mentor->show()]);
    }

    public function mentorProfile()
    {
        return view('mentor.profile', [
            'faker' => Faker::create(),
            'data' => $this->mentor->show(),
        ]);
    }

    public function mentorProfileEdit(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:60',
            'password_lama' => 'nullable|max:60',
            'password' => 'nullable|max:60',
            'repassword' => 'nullable|max:60|same:password',
            'no_telp' => 'required|max:60',
            'leader' => 'nullable|max:60',
            'alamat' => 'required|max:255',
            'foto_profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'foto_profile.image' => 'Kolom foto profil harus berupa gambar.',
            'foto_profile.mimes' => 'Format gambar yang diterima adalah jpeg, png, jpg, gif, atau svg.',
            'foto_profile.max' => 'Ukuran gambar tidak boleh melebihi 2048 kilobit (2MB).',
            'repassword.same' => 'Konfirmasi password tidak cocok dengan password baru.'
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->password_lama, Auth::user()->password)) {
                return redirect()->back()->withErrors('Password lama tidak sesuai.');
            }
        }
        if ($request->filled('password')) {
            Auth::user()->password = Hash::make($request->password);
        }
        $user = User::find($this->mentor->show()->value('user_id'));
        $user->nama = $request->nama;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/profile/'), $fileName);
            $user->foto_profile = $fileName;
        }

        if ($request->filled('leader')) {
            $this->mentor->put($id, $request->only('leader'));
            Alert::success('Berhasil', 'Profile berhasil diupdate!');
        }

        Alert::success('Berhasil', 'Profile berhasil diupdate!');
        $user->save();

        return redirect()->back();

    }
    public function mentorProfile_leaderPost(Request $request)
    {
        $this->validate($request, [
            'leader' => 'required|max:60'
        ], [
            'leader.required' => 'Kolom leader wajib diisi.',
            'leader.max' => 'Kolom leader tidak boleh melebihi 50 karakter.'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $this->mentor->post($data);
        Alert::success('Berhasil', 'Data berhasil ditambahkan!');
        return redirect(route('dashboard.mentor'));
    }
}
