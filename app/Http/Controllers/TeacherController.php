<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.guru.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|unique:users,email,except,id',
            'password' => 'required',
            'nip' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nip' => $request->nip,
            'phone' => $request->phone,
            'address' => $request->address,
            'roles' => 'guru',
            'gender' => $request->gender
        ]);

        return redirect()->back()->with('success', 'Guru Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = User::findOrFail($id);
        $kelas = Classroom::get();
        return view('pages.admin.edit-data-guru', [
            'guru' => $guru,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);

        if($request->password){
            $data['password'] = bcrypt($request->password);
        } else{
            unset($data['password']);
        }

        $item->update($data);
        return redirect()->route('admin-data-guru')->with('success', 'Data Guru Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profil()
    {
        $guru = Auth::user();

        return view('pages.guru.profil',[
            'guru' => $guru
        ]);
    }

    public function update_profil(Request $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);

        if($request->password){
            $data['password'] = bcrypt($request->password);
        } else{
            unset($data['password']);
        }

        $item->update($data);
        return redirect()->back()->with('success', 'Profil Berhasil diedit');
    }

    public function tugas()
    {
        $mata_pelajaran = Lesson::get();
        return view('pages.guru.tugas',[
            'mata_pelajaran' => $mata_pelajaran
        ]);
    }

    public function detail_tugas()
    {
        return view('pages.guru.detail-tugas');
    }

    public function tugas_siswa()
    {
        return view('pages.guru.tugas-siswa');
    }

    public function data_siswa()
    {
        $kelas_guru = Auth::user()->classrooms_id;
        $siswa = User::where('roles','siswa')->where('classrooms_id', $kelas_guru)->get();
        return view('pages.guru.data-siswa', [
            'siswa' => $siswa
        ]);
    }
}
