<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\GradeGeneralization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::orderBy('name', 'ASC')->simplePaginate(10);
        return view('admin.grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $grade_generalizations = GradeGeneralization::orderBy('name', 'DESC')->get();
        return view('admin.grade.create', compact('teachers', 'grade_generalizations'));
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
            'teachers_id' => ['required', 'exists:teachers,id'],
            'grade_generalizations_id' => ['required'],
            'name' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $name = $request->name;
        $teachers_id = $request->teachers_id;
        $grade_generalizations_id = $request->grade_generalizations_id;

        DB::beginTransaction();
        try{
            $grade_new = new Grade;
            $grade_new->name = $name;
            $grade_new->grade_generalizations_id = $grade_generalizations_id;
            $grade_new->teachers_id = $teachers_id;
            $grade_new->save();
            DB::commit();
            return redirect()->route('admin.grade.index')->with('success', 'Berhasil menambahkan data kelas baru');
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal menambahkan data kelas');
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
        $grade = Grade::find($id);
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $grade_generalizations = GradeGeneralization::all();
        return view('admin.grade.show', compact('grade_generalizations', 'grade', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        $teachers = Teacher::orderBy('name', 'ASC')->get();
        $grade_generalizations = GradeGeneralization::all();
        return view('admin.grade.edit', compact('grade_generalizations', 'grade', 'teachers'));
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
            'teachers_id' => ['required', 'exists:teachers,id'],
            'grade_generalizations_id' => ['required', 'exists:grade_generalizations,id'],
            'name' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $id = $request->id;
        $teachers_id = $request->teachers_id;
        $grade_generalizations_id = $request->grade_generalizations_id;
        $name = $request->name;

        DB::beginTransaction();
        try{
            $grade = Grade::find($id);
            $grade->teachers_id = $teachers_id;
            $grade->name = $name;
            $grade->grade_generalizations_id = $grade_generalizations_id;
            $grade->save();
            DB::commit();
            return redirect()->route('admin.grade.index')->with('success', 'Berhasil mengubah data kelas '.$name);
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal mengubah data kelas');
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
            $grade = Grade::find($id);
            if($grade == null){
                return back()->with('error', 'ID kelas tidak ditemukan');    
            }
            $grade->delete();
            DB::commit();
            return back()->with('success', 'Berhasil menghapus data kelas');
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal menghapus data kelas');
        }
    }
}
