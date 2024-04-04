<?php

use App\Http\Controllers\AssessmentNotesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Mahasiswa
Route::get('dashboard-student',[Controller::class,'dashboardMahasiswa'])->name('dashboard-mahasiswa');
Route::get('logbook',[LogbookController::class,'get'])->name('logbook');
Route::get('assessment-notes',[AssessmentNotesController::class,'get'])->name('assessment-notes');
Route::get('profile-student',[UserController::class,'getProfileStudent']);
Route::get('student-account',[UserController::class,'getStudentAccount']);
