<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $siswa = User::where('roles','siswa')->count();
        $guru = User::where('roles','guru')->count();
        return view('pages.admin.dashboard',[
            'siswa' => $siswa,
            'guru' => $guru
        ]);
    }

    public function siswa()
    {
        $siswa = User::where('roles','siswa')->get();
        return view('pages.admin.data-siswa',[
            'siswa' => $siswa
        ]);
    }

    public function guru()
    {
        $guru = User::with('kelas')->where('roles','guru')->get();
        $kelas = Classroom::get();
        return view('pages.admin.data-guru',[
            'guru' => $guru,
            'kelas' => $kelas
        ]);
    }

    public function staff()
    {
        $staff = User::where('roles','staff')->get();
        return view('pages.admin.data-staff',[
            'staff' => $staff
        ]);
    }
    
}
