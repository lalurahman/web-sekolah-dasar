<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthUserController::class, 'login'])->name('login');
Route::post('/login', [AuthUserController::class, 'login_process'])->name('login-process');
Route::get('/login-admin', [AuthUserController::class, 'login_admin'])->name('login-admin');
Route::post('/login-admin', [AuthUserController::class, 'login_admin_process'])->name('login-admin-process');
Route::get('/register', [AuthUserController::class, 'register'])->name('register');
Route::post('/register', [StudentController::class, 'store'])->name('register-student');
Route::get('/logout', [AuthUserController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'administrator', 'middleware' => ['auth', 'islogin:admin']], function(){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard-admin');
    // guru
    Route::get('/data-guru', [AdminController::class, 'guru'])->name('admin-data-guru');
    Route::get('/data-guru/edit/{id}', [TeacherController::class, 'edit'])->name('admin-edit-guru');
    Route::put('/data-guru/update/{id}', [TeacherController::class, 'update'])->name('admin-update-guru');
    Route::post('/data-guru/tambah', [TeacherController::class, 'store'])->name('admin-tambah-guru');
    // staff
    Route::get('/data-staff', [AdminController::class, 'staff'])->name('admin-data-staff');
    Route::get('/data-staff/edit/{id}', [StaffController::class, 'edit'])->name('admin-edit-staff');
    Route::put('/data-staff/update/{id}', [StaffController::class, 'update'])->name('admin-update-staff');
    Route::post('/data-staff/tambah', [StaffController::class, 'store'])->name('admin-tambah-staff');
    // siswa
    Route::get('/data-siswa', [AdminController::class, 'siswa'])->name('admin-data-siswa');
    Route::get('/data-siswa/edit/{id}', [StudentController::class, 'edit'])->name('admin-edit-siswa');
    Route::put('/data-siswa/update/{id}', [StudentController::class, 'update'])->name('admin-update-siswa');
    Route::post('/data-siswa/tambah', [StudentController::class, 'store'])->name('admin-tambah-siswa');
    // mata pelajaran
    Route::get('/data-pelajaran',[LessonController::class, 'index'])->name('admin-data-pelajaran');
    Route::post('/tambah-pelajaran',[LessonController::class, 'store'])->name('admin-tambah-pelajaran');
    Route::get('/edit-pelajaran/{id}',[LessonController::class, 'edit'])->name('admin-edit-pelajaran');
    Route::put('/update-pelajaran/{id}',[LessonController::class, 'update'])->name('admin-update-pelajaran');
    // kelas
    Route::get('/data-kelas',[ClassroomController::class, 'index'])->name('admin-data-kelas');
    Route::post('/tambah-kelas',[ClassroomController::class, 'store'])->name('admin-tambah-kelas');
    Route::get('/edit-kelas/{id}',[ClassroomController::class, 'edit'])->name('admin-edit-kelas');
    Route::put('/update-kelas/{id}',[ClassroomController::class, 'update'])->name('admin-update-kelas');
});

Route::group(['prefix' => 'guru', 'middleware' => ['auth', 'islogin:guru']], function(){
    Route::get('/', [TeacherController::class, 'index'])->name('dashboard-guru');
    Route::get('/profil', [TeacherController::class, 'profil'])->name('profil-guru');
    Route::put('/profil/{id}', [TeacherController::class, 'update'])->name('update-profil-guru');
    Route::get('/tugas', [TeacherController::class, 'tugas'])->name('guru-data-tugas');
    Route::post('/tugas/tambah-tugas', [TeacherController::class, 'tambah_tugas'])->name('guru-tambah-tugas');
    Route::get('/tugas/detail-tugas/{id}', [TeacherController::class, 'detail_tugas'])->name('guru-detail-tugas');
    Route::put('/tugas/update-tugas/{id}', [TeacherController::class, 'update_tugas'])->name('guru-update-tugas');
    Route::get('/tugas/detail-tugas/siswa', [TeacherController::class, 'tugas_siswa'])->name('guru-detail-tugas-siswa');
    Route::get('/data-siswa', [TeacherController::class, 'data_siswa'])->name('guru-data-siswa');
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'islogin:staff']], function(){
    Route::get('/', [StaffController::class, 'index'])->name('dashboard-staff');
});

Route::group(['prefix' => 'siswa', 'middleware' => ['auth', 'islogin:siswa']], function(){
    Route::get('/', [StudentController::class, 'index'])->name('dashboard-siswa');
    Route::get('/tugas', [StudentController::class, 'tugas'])->name('siswa-data-tugas');
    Route::get('/tugas/detail-tugas/{id}', [StudentController::class, 'detail_tugas'])->name('siswa-detail-tugas');

});

