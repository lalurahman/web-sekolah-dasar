<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\DetailTask;
use App\Models\DetailTaskGallery;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.siswa.dashboard');
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|unique:users,email,except,id',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'roles' => 'siswa'
        ]);

        return redirect()->route('login');
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
        $siswa = User::findOrFail($id);
        $kelas = Classroom::get();
        return view('pages.admin.edit-data-siswa', [
            'siswa' => $siswa,
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
        return redirect()->route('admin-data-siswa')->with('success', 'Data Siswa Berhasil diedit');
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

    public function tugas()
    {
        $tugas = Task::with('lesson')->orderBy('created_at','desc')->where('classroom_id', Auth::user()->classroom_id)->get();
        $detail_tugas = DetailTask::with(['task','user'])->first();
        return view('pages.siswa.tugas',[
            'tugas' => $tugas,
            'detail_tugas' => $detail_tugas
        ]);
    }

    public function detail_tugas($id)
    {
        $tugas = Task::findOrFail($id);
        
        $detail_tugas = DetailTask::with(['task','detail_task_gallery','user'])->where('task_id', $id)->where('user_id', Auth::user()->id)->first();
        
        // $gallery_tugas = DetailTaskGallery::with('detail_task')->where('detail_task_id', $detail_tugas->id)->get();
        return view('pages.siswa.detail-tugas',[
            'tugas' => $tugas,
            'detail_tugas' => $detail_tugas,
            // 'gallery_tugas' => $gallery_tugas
        ]);
    }

    public function kerjakan_tugas(Request $request)
    {
        DetailTask::create([
            'task_id' => $request->task_id,
            'user_id' => Auth::user()->id,
            'nilai' => 0
        ]);

        return redirect()->back();
    }

    public function kirim_tugas(Request $request)
    {
        $this->validate($request,[
            'photo' => 'image|max:2048',
            'detail_task_id' => 'required'
        ],[
            'photo.max' => 'Gambar produk tidak boleh lebih dari 2 MB'
        ]);
        
        $data = $request->all();
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $nama_file = time() . "_" . $photo->getClientOriginalName();

            $storage = 'tugas-siswa';
            $photo->move($storage, $nama_file);
            $data['photo'] = $nama_file;
            $data['detail_task_id'] = $request->detail_task_id;
            DetailTaskGallery::create($data);
        } 

        return redirect()->back()->with('success','Tugas Berhasil Dikirim');
    }
}
