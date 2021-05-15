<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionGrid;
use App\Models\Profile;
use App\Models\Study;
use App\Models\TeacherStudy;
use App\Models\TeacherGradeSpecialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Classes\QuestionGridClass;
use App\Classes\QuestionGridHeaderClass;
use App\Models\BasicCompetency;
use App\Models\Lesson;
use App\Models\StudyLessonScopeLesson;
use App\Models\TeacherGradeGeneralization;

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

    public function get_step_0()
    {
        return view('user.question_grid.step_0');
    }

    public function get_step_0_store($type)
    {
        switch ($type){
            case 'PTS' : $type = 'Penilaian Tengah Semester'; break;
            case 'PAT' : $type = 'Penilaian Akhir Tahun'; break;
            case 'PKK' : $type = 'Penilaian Kenaikan Kelas'; break;
        }
        $this->put_session('_question_grid_step_0', $type);
        return redirect()->intended('user/question-grid/step-1');
    }
    
    public function get_step_1()
    {
        $profile = Profile::first();
        $user = Auth::guard('user')->user();
        $teacher_studies = TeacherStudy::where('teachers_id', $user->teacher->id)->orderBy('created_at', 'DESC')->get();
        $teacher_grade_generalizations = TeacherGradeGeneralization::where('teachers_id', $user->teacher->id)->orderBy('created_at', 'DESC')->get();
        return view('user.question_grid.step_1', compact('profile', 'teacher_studies', 'teacher_grade_generalizations'));
    }

    public function get_step_1_store(Request $request)
    {
        $user = Auth::guard('user')->user();
        $satuan_pendidikan = $request->satuan_pendidikan;
        $mata_pelajaran = $request->mata_pelajaran;
        $kelas = $request->kelas;
        $tahun_ajaran = $request->tahun_ajaran;
        $semester = $request->semester;
        $kurikulum = $request->kurikulum;

        $question_grid_header_step_1 = new QuestionGridHeaderClass; // Berbentuk Object
        $question_grid_header_step_1->satuan_pendidikan = $satuan_pendidikan;
        $question_grid_header_step_1->mata_pelajaran = $mata_pelajaran;
        $question_grid_header_step_1->kelas = $kelas;
        $question_grid_header_step_1->tahun_ajaran = $tahun_ajaran;
        $question_grid_header_step_1->semester = $semester;
        $question_grid_header_step_1->kurikulum = $kurikulum;

        Session::put('teachers_id_'.$user->id.'_question_grid_header_step_1', $question_grid_header_step_1);
        return redirect()->route('user.question_grid_step_2');
    }

    public function get_step_2()
    {
        $user = Auth::guard('user')->user();
        $session = $this->get_session('_question_grid_header_step_1');
        $studies_id = $session->mata_pelajaran;
        $study_lesson_scope_lessons = StudyLessonScopeLesson::where('studies_id', $studies_id)->get();

        $basic_competencies = BasicCompetency::where('studies_id', $studies_id)->where('grade_generalizations_id', $session->kelas)->get();
        return view('user.question_grid.step_2', compact('study_lesson_scope_lessons', 'basic_competencies'));
    }

    public function get_step_2_save(Request $request)
    {
        $user = Auth::guard('user')->user();

        $teachers_id = $user->teacher->id;
        $no_urut = $request->no_urut;
        $kompetensi_dasar_1 = $request->kompetensi_dasar_1;
        $materi = $request->materi;
        $indikator = $request->indikator;
        $dari_no = $request->dari_no;
        $sampai_no = $request->sampai_no;

        $question_grid_step_1 = $this->get_session('_question_grid_step_1');
        $kelas = $question_grid_step_1->kelas;

        $studies = Study::leftJoin('grades', 'studies.grades_id', 'grades.id')
                    ->leftJoin('grade_specializations','grades.grade_specializations_id', 'grade_specializations.id')
                    ->where('grade_specializations.id', $kelas)
                    ->where('studies.teachers_id', $teachers_id)
                    ->get();

        if($studies->count() == 0){
            return back()->with('error', 'Mata Pelajaran dan Kelas yang Anda ajar tidak sesuai. Coba ulang kembali');
        }

        $question_grid = new QuestionGridClass;
        $question_grid->no_urut = $no_urut;

        // Karena yang dikirim adalah value id dari basic_competencies ubah dulu jadi isiannya
        $kompetensi_dasar_1 = BasicCompetency::find($kompetensi_dasar_1);
        $question_grid->kompetensi_dasar_1 = $kompetensi_dasar_1->name;
        $kompetensi_dasar_2 = BasicCompetency::find($kompetensi_dasar_2);
        $question_grid->kompetensi_dasar_2 = ($kompetensi_dasar_2 != null ) ? $kompetensi_dasar_2->name : null;
        $kompetensi_dasar_3 = BasicCompetency::find($kompetensi_dasar_3);
        $question_grid->kompetensi_dasar_3 = ($kompetensi_dasar_3 != null ) ? $kompetensi_dasar_3->name : null;

        // Karena yang dikirim adalah value id dari lessons ubah dulu jadi isiannya
        $materi = Lesson::find($materi);
        $question_grid->materi = $materi->name;
        $question_grid->indikator = $indikator;
        $question_grid->dari_no = $dari_no;
        $question_grid->sampai_no = $sampai_no;
        
        if(Session::has('teachers_id_'.$user->id.'_question_grid_step_2')){
            $session = $this->get_session('_question_grid_step_2');
            $session_temp = $this->get_session('_temp');
            array_push($session, $question_grid);
            
            $session = $this->put_session('_question_grid_step_2', $session);
            $session = $this->put_session('_temp', ($session_temp + 1));
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

    public function get_step_2_delete($i)
    {
        $session = $this->get_session('_question_grid_step_2');
        array_splice($session, $i, 1);
        $this->put_session('_question_grid_step_2', $session);

        $session_temp = $this->get_session('_temp');
        $session = $this->put_session('_temp', ($session_temp - 1));
        
        return back()->with('success', 'Kisi - kisi soal telah terhapus');
    }

    public function get_step_3()
    {
        return view('user.question_grid.step_3');
    }

    public function get_step_finish()
    {
        $user = Auth::guard('user')->user();

        // Ambil semua session
        $session_0 = $this->get_session('_question_grid_step_0');
        $session_1 = $this->get_session('_question_grid_step_1');
        $session_2 = $this->get_session('_question_grid_step_2');

        $type = '';
        if($session_0 == 'Penilaian Tengah Semester'){
            $type = 'PTS'; 
        }else if($session_0 == 'Penilaian Akhir Tahun'){
            $type = 'PAT';
        }else if($session_0 == 'Penilaian Kenaikan Kelas'){
            $type = 'PKK';
        }

        for($i = 0; $i < count($session_2); $i++){
            for($j = 1; $j <= 3; $j++){ // 3 kali untuk 3 jenis ujian PTS, PAT, PKK
                if(array_key_exists('kompetensi_dasar_'.$j, $session_2[$i])){
                    if($session_2[$i]->{'kompetensi_dasar_'.$j } != null){
                        $basic_competency = BasicCompetency::where('name', 'LIKE', $session_2[$i]->{'kompetensi_dasar_'.$j })->first();
                        $lesson = Lesson::where('name', 'LIKE', $session_2[$i]->materi)->first();
                        $question_grid = new QuestionGrid;
                        $question_grid->teachers_id = $user->teachers_id;
                        $question_grid->type = $type;
                        $question_grid->studies_id = $session_1->mata_pelajaran;
                        $question_grid->grade_specializations_id = $session_1->kelas;
                        $question_grid->time_allocation = $session_2[$i]->alokasi_waktu;
                        $question_grid->total = $session_1->jumlah_soal;
                        $question_grid->basic_competencies_id = $basic_competency->id;
                        $question_grid->indicator = $session_2[$i]->indikator;
                        $question_grid->lessons_id = $lesson->id;
                        $question_grid->sorting_number = $session_2[$i]->no_urut;
                        $question_grid->start_number = $session_2[$i]->dari_no;
                        $question_grid->end_number = $session_2[$i]->sampai_no;
                        $tahun_ajaran_akhir = (intval($session_1->tahun_ajaran) + 1);
                        $question_grid->school_year = $session_1->tahun_ajaran.'-'.$tahun_ajaran_akhir;
                        $question_grid->time_allocation = $session_1->alokasi_waktu;
                        $question_grid->form = $session_1->jenis_soal;
                        $question_grid->save();
                    }
                }  
            }
        }

        return redirect()->route('user.dashboard.index')->with('success', 'Kisi - kisi soal berhasil dibuat!');
    }

    protected function get_session($question_grid_step_number)
    {
        $user = Auth::guard('user')->user();
        return Session::get('teachers_id_'.$user->id.$question_grid_step_number);
    }

    protected function put_session($question_grid_step_number, $session)
    {
        $user = Auth::guard('user')->user();
        Session::put('teachers_id_'.$user->id.$question_grid_step_number, $session);
    }
}
