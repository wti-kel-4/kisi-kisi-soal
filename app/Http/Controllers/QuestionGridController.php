<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionGrid;
use App\Models\Profile;
use App\Models\Study;
use App\Models\TeacherGrade;
use Auth;
use Session;
use App\Classes\QuestionGridClass;

class QuestionGridController extends Controller
{
    public function index()
    {
        $question_grids = QuestionGrid::orderBy('teachers_id', 'ASC')->get();
        return view('admin.question_grid.index', compact('question_grids'))->with('teacher','study','basic_competency');
    }

    public function show($id)
    {
        $question_grid = QuestionGrid::find($id);
        return view('admin.question_grid.show', compact('question_grid'));
    }

    public function destroy($id)
    {
        try{
            $question_grid = QuestionGrid::findorfail($id);
            $question_grid->delete();
            return back()->with('info', 'Data berhasil dihapus');
        }catch(\Exception $e){
            return back()->with('error', 'Mata Pelajaran sedang digunakan');
        }
    }

    public function get_step_1()
    {
        $profile = Profile::first();
        $teachers_id = Auth::guard('user')->user()->teacher->id;
        $studies = Study::where('teachers_id', $teachers_id)->get();
        $teacher_grades = TeacherGrade::select('grades.id','grades.name')
                                        ->leftJoin('grades', 'teacher_grades.grades_id', 'grades.id')
                                        ->where('teacher_grades.teachers_id', $teachers_id)
                                        ->get();
        return view('user.question_grid.step_1', compact('profile', 'studies', 'teacher_grades'));
    }

    public function get_step_1_store(Request $request)
    {
        $satuan_pendidikan = $request->satuan_pendidikan;
        $mata_pelajaran = $request->mata_pelajaran;
        $kelas = $request->kelas;
        $alokasi_waktu = $request->alokasi_waktu;
        $jumlah_soal = $request->jumlah_soal;
        $jenis_soal = $request->jenis_soal;
        $tahun_ajaran = $request->tahun_ajaran;

        $user = Auth::guard('user')->user();
        $question_grid_step_1 = new QuestionGridClass;
        $question_grid_step_1->satuan_pendidikan = $satuan_pendidikan;
        $question_grid_step_1->mata_pelajaran = $mata_pelajaran;
        $question_grid_step_1->kelas = $kelas;
        $question_grid_step_1->alokasi_waktu = $alokasi_waktu;
        $question_grid_step_1->jumlah_soal = $jumlah_soal;
        $question_grid_step_1->jenis_soal = $jenis_soal;
        $question_grid_step_1->tahun_ajaran = $tahun_ajaran;
        Session::put('teachers_id_'.$user->id.'_question_grid_step_1', $question_grid_step_1);
        return redirect()->route('question_grid_step_2');
    }

    public function get_step_2()
    {
        return view('user.question_grid.step_2');
    }

    public function get_step_3()
    {
        return view('user.question_grid.step_3');
    }

  
}
