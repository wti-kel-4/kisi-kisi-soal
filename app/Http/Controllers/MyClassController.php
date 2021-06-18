<?php

namespace App\Http\Controllers;

use App\Models\GradeGeneralization;
use App\Models\TeacherGradeGeneralization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyClassController extends Controller
{
    public function index()
    {
        $user = Auth::guard('user')->user();
        $teacher_grade_generalizations = TeacherGradeGeneralization::where('teachers_id', $user->teachers_id)->orderBy('created_at', 'DESC')->get();
        return view('user.my-class.index', compact('teacher_grade_generalizations'));
    }

    public function create()
    {
        $user = Auth::guard('user')->user();
        $teacher_grade_generalizations = TeacherGradeGeneralization::select('grade_generalizations_id')->where('teachers_id', $user->teachers_id)->orderBy('created_at', 'DESC')->get();
        $array_except_of_grade_generalizations_id = array();
        foreach($teacher_grade_generalizations as $teacher_grade_generalization){
            array_push($array_except_of_grade_generalizations_id, $teacher_grade_generalization->grade_generalizations_id);
        }
        $grade_generalizations = GradeGeneralization::whereNotIn('id', $array_except_of_grade_generalizations_id)->get();
        return view('user.my-class.create', compact('grade_generalizations'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grade_generalizations_id' => ['required']
        ]);

        if($validator->fails()){
            return back()->with('error', 'Error, Ada form yang terlewat');
        }

        $user = Auth::guard('user')->user();
        $grade_generalizations_id = $request->grade_generalizations_id;
        $teacher_grade_generalization_new = new TeacherGradeGeneralization;
        $teacher_grade_generalization_new->teachers_id = $user->teachers_id;
        $teacher_grade_generalization_new->grade_generalizations_id = $grade_generalizations_id;
        $teacher_grade_generalization_new->save();

        return redirect()->route('user.my-class.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function destroy(Request $request, $my_class){
        $my_class->delete();
        return redirect()->route('user.my-class.index')->with('success', 'Berhasil Menghapus Data');
    }
}
