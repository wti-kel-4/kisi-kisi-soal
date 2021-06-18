<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\TeacherGradeGeneralization;
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
        return view('user.my_study.index', compact('teacher_studies'));
    }

    public function create()
    {
        $user = Auth::guard('user')->user();
        $teacher_grade_generalizations = TeacherGradeGeneralization::where('teachers_id', $user->teachers_id)->get();
        $array_of_grade_generalizations_id = array();
        foreach($teacher_grade_generalizations as $teacher_grade_generalization){
            array_push($array_of_grade_generalizations_id, $teacher_grade_generalization->grade_generalization->id);
        }
        $teacher_studies = TeacherStudy::select('studies_id')->where('teachers_id', $user->teachers_id)->orderBy('created_at', 'DESC')->get();
        $array_except_of_studies_id = array();
        foreach($teacher_studies as $teacher_study){
            array_push($array_except_of_studies_id, $teacher_study->studies_id);
        }
        $studies = Study::whereNotIn('id', $array_except_of_studies_id)->whereIn('grade_generalizations_id', $array_of_grade_generalizations_id)->get();
        return view('user.my_study.create', compact('studies'));
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

        // Ketika teacher_grade_generalizations tidak terdapat id user->teachers_id ini, maka tambahkan
        // Untuk otomatis mendeteksi ada kelas baru untuk mata pelajaran ini
        // Kalau tidak ditambahkan maka mata pelajaran dan kelas tidak sinkron saat pembuatan karu/kisi soal
        $study_selected = Study::find($studies_id);
        if(!TeacherGradeGeneralization::where('teachers_id', $user->teachers_id)->where('grade_generalizations_id', $study_selected->grade_generalizations_id)->first()){
            $teacher_grade_generalization_new = new TeacherGradeGeneralization;
            $teacher_grade_generalization_new->teachers_id = $user->teachers_id;
            $teacher_grade_generalization_new->grade_generalizations_id = $study_selected->grade_generalizations_id;
            $teacher_grade_generalization_new->save();
        }

        return redirect()->route('user.my-study.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function destroy(Request $request, $my_study){
        $teacher_study_selected = TeacherStudy::find($my_study);
        $teacher_study_selected->delete();
        return redirect()->route('user.my-study.index')->with('success', 'Berhasil Menghapus Data');
    }
}
