<?php

use App\Http\Controllers\AssessmentNotesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DepartementHeadController;
use App\Http\Controllers\DosenPembimbingController;
use App\Http\Controllers\GrupLeaderController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MentorVokasiController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectionHeadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Mahasiswa
Route::get('dashboard-student', [Controller::class, 'dashboardMahasiswa'])->name('dashboard-mahasiswa');
Route::get('logbook', [LogbookController::class, 'get'])->name('logbook');
Route::get('assessment-notes', [AssessmentNotesController::class, 'get'])->name('assessment-notes');
Route::get('profile-student', [UserController::class, 'getProfileStudent']);
Route::get('student-account', [UserController::class, 'getStudentAccount']);

//Admin

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [Controller::class, 'admin']);
    Route::get('mahasiswa', [MahasiswaController::class, 'mahasiswa']);
    Route::get('dosen-pembimbing', [DosenPembimbingController::class, 'dosen']);
    Route::prefix('departement')->group(function () {
        Route::get('/', [DepartementController::class, 'departement']);
        Route::post('/', [DepartementController::class, 'add_departement']);
        Route::put('{id}',[DepartementController::class,'edit_departement']);
        Route::delete('{id}',[DepartementController::class,'delete_departement']);
    });
    Route::prefix('departement-head')->group(function(){
        Route::get('/', [DepartementHeadController::class, 'departement_head']);
        Route::post('/', [DepartementHeadController::class, 'add_departement_head']);
        Route::put('{id}',[DepartementHeadController::class,'edit_departement_head']);
        Route::delete('{id}',[DepartementHeadController::class,'delete_departement_head']);
    });
    Route::prefix('section')->group(function(){
        Route::get('/', [SectionController::class, 'section']);
        Route::post('/', [SectionController::class, 'add_section']);
        Route::put('{id}', [SectionController::class, 'edit_section']);
        Route::delete('{id}', [SectionController::class, 'delete_section']);
    });
    Route::prefix('section-head')->group(function(){
        Route::get('/', [SectionHeadController::class, 'section_head']);
        Route::post('/', [SectionHeadController::class, 'add_section_head']);
        Route::put('{id}', [SectionHeadController::class, 'edit_section_head']);
        Route::delete('{id}', [SectionHeadController::class, 'delete_section_head']);
    });
    Route::prefix('grup-leader')->group(function(){
        Route::get('/', [GrupLeaderController::class, 'grup_leader']);
        Route::post('/', [GrupLeaderController::class, 'add_grup_leader']);
        Route::put('{id}', [GrupLeaderController::class, 'edit_grup_leader']);
        Route::delete('{id}', [GrupLeaderController::class, 'delete_grup_leader']);
    });
    Route::prefix('mentor-vokasi')->group(function(){
        Route::get('/', [MentorVokasiController::class, 'mentor']);
        Route::post('/', [MentorVokasiController::class, 'add_mentor']);
        Route::put('{id}', [MentorVokasiController::class, 'edit_mentor']);
        Route::delete('{id}', [MentorVokasiController::class, 'delete_mentor']);
    });
});
