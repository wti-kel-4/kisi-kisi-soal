<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\TeacherStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MyStudyController extends Controller
{
    public function index()
    {
        $user = Auth::guard('user')->user();
        $teacher_studies = TeacherStudy::where('teachers_id', $user->teachers_id)->orderBy('created_at', 'DESC')->get();
        return view('user.my-study.index', compact('teacher_studies'));
    }

    public function create()
    {
        $user = Auth::guard('user')->user();
        $teacher_studies = TeacherStudy::select('studies_id')->where('teachers_id', $user->teachers_id)->orderBy('created_at', 'DESC')->get();
        $array_except_of_studies_id = array();
        foreach($teacher_studies as $teacher_studies){
            array_push($array_except_of_studies_id, $teacher_studies->studies_id);
        }
        $studies = Study::whereNotIn('id', $array_except_of_studies_id)->get();
        return view('user.my-study.create', compact('studies'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studies_id' => ['required']
        ]);

        if($validator->fails()){
            return back()->with('error', 'Error, Ada form yang terlewat');
        }

        $user = Auth::guard('user')->user();
        $studies_id = $request->studies_id;
        $teacher_study_new = new TeacherStudy;
        $teacher_study_new->teachers_id = $user->teachers_id;
        $teacher_study_new->studies_id = $studies_id;
        $teacher_study_new->save();

        return redirect()->route('user.my-study.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function destroy(Request $request, $my_study){
        var_dump($my_study->id);
        // return back();
    }
}
