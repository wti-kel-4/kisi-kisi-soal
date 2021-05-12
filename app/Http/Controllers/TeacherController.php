<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('nip', 'ASC')->simplePaginate(10);
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'nip' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $name = $request->name;
        $nip = $request->nip;

        DB::beginTransaction();
        try{
            $teacher_new = new Teacher;
            $teacher_new->name = $name;
            $teacher_new->nip = $nip;
            $teacher_new->save();
            DB::commit();
            return redirect()->route('admin.teacher.index')->with('success', 'Berhasil mendaftarkan guru '.$name);
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal mendaftarkan guru');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        if($teacher == null){
            return back();
        }
        return view('admin.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        if($teacher == null){
            return back();
        }
        return view('admin.teacher.edit', compact('teacher'));
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
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'name' => ['required'],
            'nip' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $id = $request->id;
        $name = $request->name;
        $nip = $request->nip;

        DB::beginTransaction();
        try{
            $teacher = Teacher::find($id);
            $teacher->name = $name;
            $teacher->nip = $nip;
            $teacher->save();
            DB::commit();
            return redirect()->route('admin.teacher.index')->with('success', 'Berhasil mengubah data guru '.$name);
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal mengubah data guru');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $teacher = Teacher::find($id);
            if($teacher == null){
                return back()->with('error', 'ID guru tidak ditemukan');    
            }
            $teacher->delete();
            DB::commit();
            return back()->with('success', 'Berhasil menghapus data guru');
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal menghapus data guru karena data guru sedang digunakan');
        }
    }
}
