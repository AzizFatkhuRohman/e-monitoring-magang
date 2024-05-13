<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Mahasiswa
Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('/', [UserController::class, 'postLogin'])->name('login');
//Admin
Route::middleware('auth')->group(function () {
    Route::middleware('Role:departement')->group(function () {
        Route::prefix('departement')->group(function () {
            Route::get('dashboard', [Controller::class, 'departement']);
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [MahasiswaController::class, 'mhsfordept']);
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
