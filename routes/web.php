<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DepartementHeadController;
use App\Http\Controllers\DosenPembimbingController;
use App\Http\Controllers\GrupLeaderController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MentorVokasiController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectionHeadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Mahasiswa
Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('/', [UserController::class, 'postLogin'])->name('login');
//Admin
Route::middleware('auth')->group(function () {
    Route::middleware('Role:departement_head')->group(function () {
        Route::prefix('departement-head')->group(function () {
            Route::get('dashboard', [Controller::class, 'departement_head']);
            Route::prefix('mahasiswa')->group(function(){
                Route::get('/',[MahasiswaController::class,'mhsfordept']);
            });
        });
    });
    Route::middleware('Role:dosen')->group(function () {
        Route::prefix('dosen')->group(function () {
            Route::get('dashboard', [Controller::class, 'dosen']);
            Route::get('mahasiswa', [MahasiswaController::class, 'mhsfordsn']);
        });
    });
    Route::middleware('Role:admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('dashboard', [Controller::class, 'admin']);
            Route::get('pengguna', [UserController::class, 'pengguna']);
            Route::prefix('departement')->group(function () {
                Route::get('/', [DepartementController::class, 'departement']);
                Route::post('/', [DepartementController::class, 'add_departement']);
                Route::put('{id}', [DepartementController::class, 'edit_departement']);
                Route::delete('{id}', [DepartementController::class, 'delete_departement']);
            });
            Route::prefix('departement-head')->group(function () {
                Route::get('/', [DepartementHeadController::class, 'departement_head']);
                Route::post('/', [DepartementHeadController::class, 'add_departement_head']);
                Route::put('{id}', [DepartementHeadController::class, 'edit_departement_head']);
                Route::delete('{id}', [DepartementHeadController::class, 'delete_departement_head']);
            });
            Route::prefix('section')->group(function () {
                Route::get('/', [SectionController::class, 'section']);
                Route::post('/', [SectionController::class, 'add_section']);
                Route::put('{id}', [SectionController::class, 'edit_section']);
                Route::delete('{id}', [SectionController::class, 'delete_section']);
            });
            Route::prefix('section-head')->group(function () {
                Route::get('/', [SectionHeadController::class, 'section_head']);
                Route::post('/', [SectionHeadController::class, 'add_section_head']);
                Route::put('{id}', [SectionHeadController::class, 'edit_section_head']);
                Route::delete('{id}', [SectionHeadController::class, 'delete_section_head']);
            });
            Route::prefix('grup-leader')->group(function () {
                Route::get('/', [GrupLeaderController::class, 'grup_leader']);
                Route::post('/', [GrupLeaderController::class, 'add_grup_leader']);
                Route::put('{id}', [GrupLeaderController::class, 'edit_grup_leader']);
                Route::delete('{id}', [GrupLeaderController::class, 'delete_grup_leader']);
            });
            Route::prefix('mentor-vokasi')->group(function () {
                Route::get('/', [MentorVokasiController::class, 'mentor']);
                Route::post('/', [MentorVokasiController::class, 'add_mentor']);
                Route::put('{id}', [MentorVokasiController::class, 'edit_mentor']);
                Route::delete('{id}', [MentorVokasiController::class, 'delete_mentor']);
            });
            Route::prefix('dosen-pembimbing')->group(function () {
                Route::get('/', [DosenPembimbingController::class, 'dosen']);
                Route::post('/', [DosenPembimbingController::class, 'add_dosen']);
                Route::put('{id}', [DosenPembimbingController::class, 'edit_dosen']);
                Route::delete('{id}', [DosenPembimbingController::class, 'delete_dosen']);
            });
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [MahasiswaController::class, 'mahasiswa']);
                Route::post('/', [MahasiswaController::class, 'add_mahasiswa']);
                Route::put('{id}', [MahasiswaController::class, 'edit_mahasiswa']);
                Route::delete('{id}', [MahasiswaController::class, 'delete_mahasiswa']);
            });
        });
    });
});
