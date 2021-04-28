<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study;
use App\Models\Teacher;
use App\Models\Grade;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = Study::orderBy('name', 'ASC')->get();
        return view('admin.study.index', compact('studies'))->with('teacher','grade');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::orderBy('name', 'ASC')->get();
        $grade = Grade::orderBy('name', 'ASC')->get();
        return view('admin.study.create', compact('teacher','grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teachers_id' => 'required',
            'grades_id' => 'required',
        ]);

        Study::create($request->all());
        return redirect()->route('study.index')
                            ->with('success', 'Berhasil menambahkan data.');
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
        $study = Study::with('teacher','grade')->findorfail($id);
        $teacher = Teacher::all();
        $grade = Grade::all();
        return view('admin.study.edit', compact('study','teacher','grade'));
        // return redirect()->route('study.edit', compact('study','teacher','grade'));
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
            $study = Study::findorfail($id);
            $study->update($request->all());
            return redirect()->route('study.index')
                                ->with('success', 'Berhasil mengedit data.');
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
