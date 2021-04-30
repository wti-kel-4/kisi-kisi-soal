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
use App\Models\BasicCompetency;
use App\Models\Lesson;

class QuestionGridController extends Controller
{
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
        $teachers_id = Auth::guard('user')->user()->teacher->id;
        $satuan_pendidikan = $request->satuan_pendidikan;
        $mata_pelajaran = $request->mata_pelajaran;
        $kelas = $request->kelas;
        $alokasi_waktu = $request->alokasi_waktu;
        $jumlah_soal = $request->jumlah_soal;
        $jenis_soal = $request->jenis_soal;
        $tahun_ajaran = $request->tahun_ajaran;

        $studies = Study::where('grades_id', $kelas)->where('teachers_id', $teachers_id)->get();
        if($studies->count() == 0){
            return back()->with('error', 'Mata Pelajaran dan Kelas yang Anda ajar tidak sesuai. Coba ulang kembali');
        }

        $user = Auth::guard('user')->user();
        $question_grid_step_1 = new QuestionGridClass; // Berbentuk Object
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
        $session = $this->get_session('_question_grid_step_1');
        $studies_id = $session->mata_pelajaran;
        $teacher_grade = TeacherGrade::find($session->kelas);

        $lessons = Lesson::where('studies_id', $studies_id)->where('grade_specializations_id', $teacher_grade->grade->grade_specialization->id)->get();
        $basic_competencies = BasicCompetency::where('studies_id', $studies_id)->where('grade_specializations_id', $teacher_grade->grade->grade_specialization->id)->get();
        $total_question_grid = $session->jumlah_soal;
        return view('user.question_grid.step_2', compact('lessons', 'basic_competencies', 'total_question_grid'));
    }

    public function get_step_2_save(Request $request)
    {
        if(Session::has('teachers_id_'.$user->id.'_temp')){
            $session_temp = $this->get_session('_temp');
            $session = $this->get_session('teachers_id_'.$user->id.'_question_grid_step_1');
            if($session->jumlah_soal > $session_temp){
                return return back()->with('info', 'Slot kisi - kisi soal sudah penuh, Anda bisa langsung untuk menuju step berikutnya');
            }
        }else{
        $teachers_id = Auth::guard('user')->user()->teacher->id;
        $no_urut = $request->no_urut;
        $kompetensi_dasar = $request->kompetensi_dasar;
        $materi = $request->materi;
        $indikator = $request->indikator;
        $bentuk = $request->bentuk;
        $dari_no = $request->dari_no;
        $sampai_no = $request->sampai_no;

        $question_grid_step_1 = $this->get_session('_question_grid_step_1');
        $kelas = $question_grid_step_1->kelas;

        $studies = Study::where('grades_id', $kelas)->where('teachers_id', $teachers_id)->get();
        if($studies->count() == 0){
            return back()->with('error', 'Mata Pelajaran dan Kelas yang Anda ajar tidak sesuai. Coba ulang kembali');
        }

        $user = Auth::guard('user')->user();

        $question_grid = new QuestionGridClass;
        $question_grid->no_urut = $no_urut;
        $question_grid->kompetensi_dasar = $kompetensi_dasar;
        $question_grid->materi = $materi;
        $question_grid->indikator = $indikator;
        $question_grid->bentuk = $bentuk;
        $question_grid->dari_no = $dari_no;
        $question_grid->sampai_no = $sampai_no;
        
        if(Session::has('teachers_id_'.$user->id.'_question_grid_step_2')){
            $session = $this->get_session('_question_grid_step_2');
            array_push($session, $question_grid);
        }else{
            $question_grid_step_2 = array(); // Berbentuk Array of Object
            array_push($question_grid_step_2, $question_grid);
            Session::put('teachers_id_'.$user->id.'_question_grid_step_2', $question_grid_step_2);

            // Masukkan ke session temp untuk menghitung qty_question_grid
            $qty_question_grid = 1;
            Session::put('teachers_id_'.$user->id.'_temp', $qty_question_grid);
        }
        
        return back()->with('success', 'Kisi - kisi soal tersimpan sementara, silahkan melihat progress pengerjaan di bawah form ini');
    }

    public function get_step_3()
    {
        return view('user.question_grid.step_3');
    }

    protected function get_session($question_grid_step_number)
    {
        $user = Auth::guard('user')->user();
        return Session::get('teachers_id_'.$user->id.$question_grid_step_number);
    }
}
