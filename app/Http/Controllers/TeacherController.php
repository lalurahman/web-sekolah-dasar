<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\DetailTask;
use App\Models\DetailTaskGallery;
use App\Models\Lesson;
use App\Models\Task;
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
        $tugas = Task::with('lesson')->orderBy('created_at','desc')->where('classroom_id', Auth::user()->classroom_id)->get();
        return view('pages.guru.tugas',[
            'mata_pelajaran' => $mata_pelajaran,
            'tugas' => $tugas
        ]);
    }

    public function tambah_tugas(Request $request)
    {
        $this->validate($request, [
            'lesson_id' => 'required',
            'title' => 'required|string',
            'detail' => 'string',
            'due_date' => 'required'
        ]);

        Task::create([
            'lesson_id' => $request->lesson_id,
            'classroom_id' => Auth::user()->classroom->id,
            'title' => $request->title,
            'detail' => $request->detail,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('guru-data-tugas')->with('success','Tugas baru telah ditambahkan');
    }

    public function detail_tugas($id)
    {
        $tugas = Task::findOrFail($id);
        $mata_pelajaran = Lesson::get();
        $tugas_siswa = DetailTask::with(['task','user'])->where('task_id', $tugas->id)->get();
        return view('pages.guru.detail-tugas', [
            'tugas' => $tugas,
            'mata_pelajaran' => $mata_pelajaran,
            'tugas_siswa' => $tugas_siswa
        ]);
    }

    public function update_tugas(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'detail' => 'string'
        ]);
        $data = $request->all();
        $item = Task::findOrFail($id);
        $item->update($data);
        return redirect()->back();
    }

    public function tugas_siswa($id)
    {
        $detail_tugas_siswa = DetailTask::with(['task','detail_task_gallery'])->find($id);
        
        return view('pages.guru.tugas-siswa',[
            'detail_tugas_siswa' => $detail_tugas_siswa
        ]);
    }

    public function beri_nilai(Request $request, $id)
    {
        $data = $request->all();
        $item = DetailTask::findOrFail($id);
        $data['status_periksa'] = 1;
        $item->update($data);
        return redirect()->back();
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
