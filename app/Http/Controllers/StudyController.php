<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\GradeGeneralization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = Study::orderBy('created_at', 'DESC')->get();
        return view('admin.study.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::orderBy('name', 'ASC')->get();
        return view('admin.study.create', compact('grades'));
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
            'grades_id' => ['required', 'exists:grades,id'],
            'name' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $name = $request->name;
        $grades_id = $request->grades_id;

        DB::beginTransaction();
        try{
            $study_new = new Study;
            $study_new->name = $name;
            $study_new->grades_id = $grades_id;
            $study_new->save();
            DB::commit();
            return redirect()->route('admin.study.index')->with('success', 'Berhasil mendaftarkan mata pelajaran '.$name);
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal mendaftarkan mata pelajaran');
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
        $study = Study::find($id);
        $grade_generalizations = GradeGeneralization::all();
        return view('admin.study.show', compact('study', 'grade_generalizations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $study = Study::findorfail($id);
        $grade_generalizations = GradeGeneralization::all();
        return view('admin.study.edit', compact('study','grade_generalizations'));
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
            'id' => ['required', 'exists:studies,id'],
            'grade_generalizations_id' => ['required', 'exists:grade_generalizations,id'],
            'name' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $id = $request->id;
        $name = $request->name;
        $grades_id = $request->grades_id;

        DB::beginTransaction();
        try{
            $study = Study::find($id);
            $study->name = $name;
            $study->grades_id = $grades_id;
            $study->save();
            DB::commit();
            return redirect()->route('admin.study.index')->with('success', 'Berhasil mengubah data mata pelajaran');
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal mendaftarkan mata pelajaran');
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
        try{
            $study = Study::findorfail($id);
            $study->delete();
            return back()->with('info', 'Data berhasil dihapus');
        }catch(\Exception $e){
            return back()->with('error', 'Mata Pelajaran sedang digunakan');
        }
    }
}
