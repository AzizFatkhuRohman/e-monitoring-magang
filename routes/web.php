<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthentifikasiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\SesiFalse;
use Illuminate\Support\Facades\Route;


//Mahasiswa
Route::middleware([SesiFalse::class])->group(function () {
    // login
    Route::get('/', [AuthentifikasiController::class, 'login'])->name('login');
    Route::post('/submit', [AuthentifikasiController::class, 'loginsubmit'])->name('submit');
    // lupa password
    Route::any('/lupa-password', [AuthentifikasiController::class, 'lupa_password'])->name('lupa_password');
    Route::any('/reset-password/{token}', [AuthentifikasiController::class, 'showResetPasswordForm'])->name('lupa_password.get');
    Route::get('/mahasiswa', [AuthentifikasiController::class, 'mahasiswa']);
    Route::get('/mentor', [AuthentifikasiController::class, 'mentor']);
});
Route::get('/logout', [AuthentifikasiController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'mahasiswa'])->name('dashboard.mahasiswa');
        Route::prefix('logbook')->group(function () {
            Route::any('pdf', [LogbookController::class, 'pdf'])->name('logbook.pdf');
            Route::prefix('weekly')->group(function () {
                Route::get('/', [LogbookController::class, 'weekly'])->name('logbook.mahasiswa');
                Route::post('add', [LogbookController::class, 'weekly_add'])->name('logbook.mahasiswa.add');
                Route::put('update/{id}', [LogbookController::class, 'weekly_put'])->name('logbook.mahasiswa.put');
                Route::post('add/mentor', [LogbookController::class, 'weekly_add_mentor'])->name('logbook.mahasiswa.add_mentor');
            });
            Route::prefix('evaluasi')->group(function () {
                Route::any('/', [LogbookController::class, 'evaluasi'])->name('logbook.evaluasi');
            });
            Route::prefix('upload')->group(function () {
                Route::any('presentasi-final', [UploadController::class, 'presentasi_final'])->name('presentasi_final.upload.mahasiswa');
                Route::any('laporan-ta', [UploadController::class, 'laporan_ta'])->name('laporan_ta.upload.mahasiswa');
                Route::any('report-a3', [UploadController::class, 'report_a3'])->name('report_a3.upload.mahasiswa');
                Route::any('sertifikat', [UploadController::class, 'sertifikat'])->name('sertifikat.upload.mahasiswa');
            });
        });
        Route::prefix('profile')->group(function () {
            Route::get('/', [DashboardController::class, 'mahasiswaProfile'])->name('profile.mahasiswa');
            Route::put('update/{id}', [DashboardController::class, 'mahasiswaProfileEdit'])->name('upload.mahasiswa');
            Route::post('pengajuan', [DashboardController::class, 'pengajuanMentor'])->name('pengajuanMentor.mahasiswa');
        });
        Route::prefix('absensi')->group(function () {
            Route::get('/', [AbsensiController::class, 'absensiKehadiran'])->name('absensi.kehadiran');
            Route::post('post', [AbsensiController::class, 'post_absensiKehadiran'])->name('post.absensi.kehadiran');
        });
    });

    Route::middleware(['role:mentor'])->group(function () {
        Route::prefix('mentor')->group(function () {
            Route::any('/', [DashboardController::class, 'mentor'])->name('dashboard.mentor');
            Route::prefix('logbook')->group(function () {
                Route::get('/', [LogbookController::class, 'mentor_weekly'])->name('logbook.mentor');
                Route::put('put/{id}', [LogbookController::class, 'mentor_weekly_put'])->name('logbook.mentor.tinjau');
                Route::delete('logbook/reject/{id}', [LogbookController::class, 'mentor_weekly_delete'])->name('logbook.mentor.reject');
            });
            Route::prefix('data')->group(function () {
                Route::any('pengajuan_mentor', [LogbookController::class, 'pengajuan_mentor'])->name('pengajuan_mentor');
                Route::any('list_mahasiswa', [LogbookController::class, 'list_mahasiswa'])->name('list_mahasiswa');
            });
            Route::prefix('profile')->group(function () {
                Route::get('/', [DashboardController::class, 'mentorProfile'])->name('profile.mentor');
                Route::post('leader/post', [DashboardController::class, 'mentorProfile_leaderPost'])->name('profile.mentor_vokasi.leader_post');
                Route::put('update/{id}', [DashboardController::class, 'mentorProfileEdit'])->name('upload.mentor_vokasi');
            });
        });
    });

    // ====
    
    Route::middleware(['role:departement'])->group(function () {
        Route::prefix('departement')->group(function () {
            Route::get('dashboard', [Controller::class, 'departement']);
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [MahasiswaController::class, 'mhsfordept']);
            });
        });
    });
    Route::middleware(['role:dosen'])->group(function () {
        Route::prefix('dosen')->group(function () {
            Route::get('dashboard', [Controller::class, 'dosen']);
            Route::get('mahasiswa', [MahasiswaController::class, 'mhsfordsn']);
        });
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('dashboard', [Controller::class, 'admin'])->name('dashboard.admin');
            Route::prefix('pengguna')->group(function () {
                Route::get('/', [UserController::class, 'pengguna']);
                Route::post('/', [UserController::class, 'add_pengguna']);
                Route::get('unduh-template', [UserController::class, 'unduh_template']);
                Route::post('import', [UserController::class, 'import']);
                Route::put('{id}', [UserController::class, 'edit_pengguna']);
                Route::delete('{id}', [UserController::class, 'hapus_pengguna']);
            });
            Route::prefix('departement')->group(function () {
                Route::get('/', [DepartementController::class, 'departement']);
                Route::post('/', [DepartementController::class, 'add_departement']);
                Route::put('{id}', [DepartementController::class, 'edit_departement']);
                Route::delete('{id}', [DepartementController::class, 'delete_departement']);
                Route::get('{id}', [DepartementController::class, 'detail_departement']);
            });
            Route::prefix('section')->group(function () {
                Route::get('/', [SectionController::class, 'section']);
                Route::post('/', [SectionController::class, 'add_section']);
                Route::put('{id}', [SectionController::class, 'edit_section']);
                Route::delete('{id}', [SectionController::class, 'delete_section']);
                Route::get('{id}', [SectionController::class, 'detail_section']);
            });
            Route::prefix('mentor')->group(function () {
                Route::get('/', [MentorController::class, 'mentor']);
                Route::post('/', [MentorController::class, 'add_mentor']);
                Route::put('{id}', [MentorController::class, 'edit_mentor']);
                Route::delete('{id}', [MentorController::class, 'delete_mentor']);
                Route::get('{id}', [MentorController::class, 'detail_mentor']);
            });
            Route::prefix('dosen')->group(function () {
                Route::get('/', [DosenController::class, 'dosen']);
                Route::post('/', [DosenController::class, 'add_dosen']);
                Route::put('{id}', [DosenController::class, 'edit_dosen']);
                Route::delete('{id}', [DosenController::class, 'delete_dosen']);
                Route::get('{id}', [DosenController::class, 'detail_dosen']);
            });
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [MahasiswaController::class, 'mahasiswa']);
                Route::post('/', [MahasiswaController::class, 'add_mahasiswa']);
                Route::put('{id}', [MahasiswaController::class, 'edit_mahasiswa']);
                Route::delete('{id}', [MahasiswaController::class, 'delete_mahasiswa']);
                Route::get('{id}', [MahasiswaController::class, 'detail_mahasiswa']);
            });
        });
    });
});
