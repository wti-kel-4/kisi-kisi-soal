<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionGrid;
use App\Models\Profile;
use App\Models\Study;
use App\Models\TeacherStudy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Classes\QuestionGridClass;
use App\Classes\QuestionGridHeaderClass;
use App\Models\BasicCompetency;
use App\Models\QuestionGridHeader;
use App\Models\Lesson;
use App\Models\LogActivity;
use App\Models\StudyLessonScopeLesson;
use App\Models\TeacherGradeGeneralization;
use Illuminate\Support\Facades\DB;
use Exception;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\PhpWord;

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

        $satuan_pendidikan = Profile::first()->name;
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
        $question_grid_header_step_1->teachers_id = $user->teacher->id;

        $this->put_session('_question_grid_header_step_1', $question_grid_header_step_1);
        return redirect()->route('user.question_grid_step_2');
    }

    public function get_step_2()
    {
        $user = Auth::guard('user')->user();
        $session = $this->get_session('_question_grid_header_step_1');
        $studies_id = $session->mata_pelajaran;
        $scope_lessons = StudyLessonScopeLesson::select('scope_lessons_id')->where('studies_id', $studies_id)->groupBy('scope_lessons_id')->get();
        $lessons = StudyLessonScopeLesson::select('lessons_id')->where('studies_id', $studies_id)->groupBy('lessons_id')->get();

        $basic_competencies = BasicCompetency::where('studies_id', $studies_id)->where('grade_generalizations_id', $session->kelas)->get();
        return view('user.question_grid.step_2', compact('scope_lessons', 'lessons', 'basic_competencies'));
    }

    public function get_step_2_save(Request $request)
    {
        $no_soal = $request->no_soal;
        $kompetensi_dasar = $request->kompetensi_dasar;
        $materi = $request->materi;
        $lingkup_materi = $request->lingkup_materi;
        $indikator = $request->indikator;
        $bentuk = $request->bentuk;
        $level = $request->level;
        $kognitif = $request->kognitif;
        
        $question_grid = new QuestionGrid;
        $question_grid->no_soal = $no_soal;
        $question_grid->kompetensi_dasar = $kompetensi_dasar;
        $question_grid->materi = $materi;
        $question_grid->lingkup_materi = $lingkup_materi;
        $question_grid->indikator = $indikator;
        $question_grid->bentuk = $bentuk;
        $question_grid->level = $level;
        $question_grid->kognitif = $kognitif;

        if($this->get_session('_question_grid_step_2')){
            
            $session = $this->get_session('_question_grid_step_2');
            $session_temp = $this->get_session('_temp');
            $question_grid->no_urut = ($session_temp + 1);
            array_push($session, $question_grid);
            
            $session = $this->put_session('_question_grid_step_2', $session);
            $session = $this->put_session('_temp', ($session_temp + 1));
        }else{
            $question_grid_step_2 = array(); // Berbentuk Array of Object
            $question_grid->no_urut = 1; // karena pertama otomatis no urut = 1

            array_push($question_grid_step_2, $question_grid);
            $this->put_session('_question_grid_step_2', $question_grid_step_2);

            // Masukkan ke session temp untuk menghitung qty_question_grid
            $qty_question_grid = 1;
            $this->put_session('_temp', $qty_question_grid);
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
        // Disimpan semua supaya bisa dipreview dan diurut
        $user = Auth::guard('user')->user();

        // Ambil semua session
        $session_0 = $this->get_session('_question_grid_step_0');
        $session_1 = $this->get_session('_question_grid_header_step_1');
        $session_2 = $this->get_session('_question_grid_step_2');

        DB::beginTransaction();
        try{
            // Jika sebelumnya sudah ada dan pernah mengunjungi halaman ini maka hapus data sebelumnya dari tabel
            QuestionGrid::join('question_grid_headers', 'question_grids.question_grid_headers_id', 'question_grid_headers.id')->where('question_grid_headers.teachers_id', $user->teacher->id)->where('question_grid_headers.temp', true)->forceDelete();
            QuestionGridHeader::where('teachers_id', $user->teacher->id)->where('temp', true)->forceDelete();
            
            // Buat ulang
            $question_grid_header = new QuestionGridHeader; // Buat headernya dulu
            $question_grid_header->type = $session_0;
            $question_grid_header->profiles_id = Profile::first()->id;
            $question_grid_header->studies_id = $session_1->mata_pelajaran;
            $question_grid_header->grade_generalizations_id = $session_1->kelas;
            $question_grid_header->school_year = $session_1->tahun_ajaran.'-'.(intval($session_1->tahun_ajaran) + 1);
            if($session_1->semester){
                $semester = 'Ganjil';
            }else{
                $semester = 'Genap';
            }
            $question_grid_header->semesters = $semester;
            $question_grid_header->curriculum = $session_1->kurikulum;
            $question_grid_header->teachers_id = $session_1->teachers_id;
            $question_grid_header->temp = true; // (true) karena masih belum fix atau bisa diedit/diulang/dipreview
            $question_grid_header->save();

            if($session_2 != null){
                for($i = 0; $i < count($session_2); $i++){
                    $question_grid = new QuestionGrid; // Buat rows nya
                    $question_grid->question_grid_headers_id = $question_grid_header->id;
                    $question_grid->basic_competencies_id = $session_2[$i]->kompetensi_dasar;
                    $question_grid->study_lesson_scope_lessons_id = StudyLessonScopeLesson::where('studies_id', $session_1->mata_pelajaran)->where('scope_lessons_id', $session_2[$i]->lingkup_materi)->where('lessons_id', $session_2[$i]->materi)->first()->id;
                    $question_grid->level = $session_2[$i]->level;
                    $question_grid->cognitive = $session_2[$i]->kognitif;
                    $question_grid->indicator = $session_2[$i]->indikator;
                    $question_grid->question_form = $session_2[$i]->bentuk;
                    $question_grid->question_number = $session_2[$i]->no_soal;
                    $question_grid->save();       
                }
                DB::commit();
            }
        }catch(Exception $ex){
            DB::rollback();
            echo $ex->getMessage();
        }

        $question_grids = QuestionGrid::where('question_grid_headers_id', $question_grid_header->id)->get(); // ambil rownya untuk looping    
        return view('user.question_grid.step_3', compact('question_grids', 'question_grid_header'));
    }

    public function get_step_finish($id)
    {
        $user = Auth::guard('user')->user();
        DB::beginTransaction();
        try{
            $question_grid_header = QuestionGridHeader::find($id);
            // Jika sudah pernah dicatat jangan catat lagi
            if($question_grid_header->temp == true){
                $question_grid_header->temp = false; // Simpan permanen
                $question_grid_header->save();

                // Catat di log activity
                $log_activity_new = new LogActivity;
                $log_activity_new->question_grid_headers_id = $id;
                $log_activity_new->action = 'make';
                $log_activity_new->users_id = $user->id;
                $log_activity_new->save();
            }
            DB::commit();
        }catch(Exception $ex){
            DB::rollback();
        }
        
        return redirect()->route('user.dashboard.index')->with('success', 'Kisi - kisi soal berhasil dibuat!');
    }

    public function get_preview($id){
        $question_grid_header = QuestionGridHeader::find($id);

        $tipe = '';
        switch($question_grid_header->type){
            case 'PTS' : $tipe = 'PENILAIAN TENGAH SEMESTER (PTS)'; break;
            case 'PAT' : $tipe = 'PENILAIAN AKHIR TAHUN (PAT)'; break;
            case 'PKK' : $tipe = 'PENILAIAN KENAIKAN KELAS (PKK)'; break;
        }

        //Create table
        $document_with_table = new PhpWord();
        $section = $document_with_table->addSection();
        $table = $section->addTable();
        $count = $question_grid_header->question_grid->count();
        
        $cell_text_style = array('name' => 'Times New Roman', 'size' => 12);
        $cell_header_text_style = array('name' => 'Times New Roman', 'size' => 12);
        $cell_header_paragraph_style = array('align' => 'center');
        $cell_style = array('borderColor' =>'000000', 'borderSize' => 6);

        // Row for table header
        $table->addRow();
        $table->addCell(50, $cell_style)->addText('NO', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3500, $cell_style)->addText('KOMPETENSI DASAR', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(1750, $cell_style)->addText('LINGKUP MATERI', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3000, $cell_style)->addText('MATERI', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3000, $cell_style)->addText('LEVEL KOGNITIF', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3500, $cell_style)->addText('INDIKATOR SOAL', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(1750, $cell_style)->addText('BENTUK SOAL', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(50, $cell_style)->addText('NO SOAL', $cell_header_text_style, $cell_header_paragraph_style);
        $i = 1;
        foreach($question_grid_header->question_grid as $question_grid){
            $table->addRow();
            $table->addCell(50, $cell_style)->addText($i, $cell_text_style);
            $table->addCell(3500, $cell_style)->addText($question_grid->basic_competency->name, $cell_text_style);
            $table->addCell(1750, $cell_style)->addText($question_grid->study_lesson_scope_lesson->scope_lesson->name, $cell_text_style);
            $table->addCell(3000, $cell_style)->addText($question_grid->study_lesson_scope_lesson->lesson->name, $cell_text_style);
            $table->addCell(3000, $cell_style)->addText($question_grid->level.' / '.$question_grid->cognitive, $cell_text_style);
            $table->addCell(3500, $cell_style)->addText($question_grid->indicator, $cell_text_style);
            if($question_grid->question_form == 'pg'){
                $form = 'Pilihan Ganda';
            }else if($question_grid->question_form == 'jumble'){
                $form = 'Menjodohkan';
            }else if($question_grid->question_form == 'isian'){
                $form = 'Isian';
            }else if($question_grid->question_form == 'uraian'){
                $form = 'Uraian';
            }
            $table->addCell(1750, $cell_style)->addText($form, $cell_text_style);
            $table->addCell(50, $cell_style)->addText($question_grid->question_number, $cell_text_style);
            $i++;
        }

        // Create writer to convert document to xml
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($document_with_table, 'Word2007');

        // Get all document xml code
        $fullxml = $objWriter->getWriterPart('Document')->write();

        // Get only table xml code
        $tablexml = preg_replace('/^[\s\S]*(<w:tbl\b.*<\/w:tbl>).*/', '$1', $fullxml);

        // Real Document
        $template_processor = new TemplateProcessor('template/question_grid.docx');

        date_default_timezone_set('Asia/Jakarta');

        $template_processor->setValues([
            'tipe' => $tipe,
            'jenjang_pendidikan' => $question_grid_header->profile->name,
            'mata_pelajaran' => $question_grid_header->study->name,
            'kelas' => $question_grid_header->grade_generalization->name,
            'tahun_ajaran' => $question_grid_header->school_year,
            'semester' => $question_grid_header->semesters,
            'kurikulum' => $question_grid_header->curriculum,
            'tanggal' => date('d-m-Y'),
            'nama_guru' => $question_grid_header->teacher->name,
            'nip_guru' => $question_grid_header->teacher->nip,
        ]);

        // Replace mark by xml code of table
        $template_processor->setValue('table', $tablexml);
        
        $filename = 'Preview-Kisi-Kisi-Soal-'.$question_grid_header->study->name;
        $template_processor->saveAs($filename.'.docx');
        return response()->download($filename.'.docx')->deleteFileAfterSend(true);
    }

    public function get_download($id){
        $question_grid_header = QuestionGridHeader::where('id', $id)->where('temp', false)->first();
        if($question_grid_header == null){
            return back();
        }

        $tipe = '';
        switch($question_grid_header->type){
            case 'PTS' : $tipe = 'PENILAIAN TENGAH SEMESTER (PTS)'; break;
            case 'PAT' : $tipe = 'PENILAIAN AKHIR TAHUN (PAT)'; break;
            case 'PKK' : $tipe = 'PENILAIAN KENAIKAN KELAS (PKK)'; break;
        }

        //Create table
        $document_with_table = new PhpWord();
        $section = $document_with_table->addSection();
        $table = $section->addTable();
        $count = $question_grid_header->question_grid->count();
        
        $cell_text_style = array('name' => 'Times New Roman', 'size' => 12);
        $cell_header_text_style = array('name' => 'Times New Roman', 'size' => 12);
        $cell_header_paragraph_style = array('align' => 'center');
        $cell_style = array('borderColor' =>'000000', 'borderSize' => 6);

        // Row for table header
        $table->addRow();
        $table->addCell(50, $cell_style)->addText('NO', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3500, $cell_style)->addText('KOMPETENSI DASAR', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(1750, $cell_style)->addText('LINGKUP MATERI', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3000, $cell_style)->addText('MATERI', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3000, $cell_style)->addText('LEVEL KOGNITIF', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(3500, $cell_style)->addText('INDIKATOR SOAL', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(1750, $cell_style)->addText('BENTUK SOAL', $cell_header_text_style, $cell_header_paragraph_style);
        $table->addCell(50, $cell_style)->addText('NO SOAL', $cell_header_text_style, $cell_header_paragraph_style);
        $i = 1;
        foreach($question_grid_header->question_grid as $question_grid){
            $table->addRow();
            $table->addCell(50, $cell_style)->addText($i, $cell_text_style);
            $table->addCell(3500, $cell_style)->addText($question_grid->basic_competency->name, $cell_text_style);
            $table->addCell(1750, $cell_style)->addText($question_grid->study_lesson_scope_lesson->scope_lesson->name, $cell_text_style);
            $table->addCell(3000, $cell_style)->addText($question_grid->study_lesson_scope_lesson->lesson->name, $cell_text_style);
            $table->addCell(3000, $cell_style)->addText($question_grid->level.' / '.$question_grid->cognitive, $cell_text_style);
            $table->addCell(3500, $cell_style)->addText($question_grid->indicator, $cell_text_style);
            if($question_grid->question_form == 'pg'){
                $form = 'Pilihan Ganda';
            }else if($question_grid->question_form == 'jumble'){
                $form = 'Menjodohkan';
            }else if($question_grid->question_form == 'isian'){
                $form = 'Isian';
            }else if($question_grid->question_form == 'uraian'){
                $form = 'Uraian';
            }
            $table->addCell(1750, $cell_style)->addText($form, $cell_text_style);
            $table->addCell(50, $cell_style)->addText($question_grid->question_number, $cell_text_style);
            $i++;
        }

        // Create writer to convert document to xml
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($document_with_table, 'Word2007');

        // Get all document xml code
        $fullxml = $objWriter->getWriterPart('Document')->write();

        // Get only table xml code
        $tablexml = preg_replace('/^[\s\S]*(<w:tbl\b.*<\/w:tbl>).*/', '$1', $fullxml);

        // Real Document
        $template_processor = new TemplateProcessor('template/question_grid.docx');

        date_default_timezone_set('Asia/Jakarta');

        $template_processor->setValues([
            'tipe' => $tipe,
            'jenjang_pendidikan' => $question_grid_header->profile->name,
            'mata_pelajaran' => $question_grid_header->study->name,
            'kelas' => $question_grid_header->grade_generalization->name,
            'tahun_ajaran' => $question_grid_header->school_year,
            'semester' => $question_grid_header->semesters,
            'kurikulum' => $question_grid_header->curriculum,
            'tanggal' => date('d-m-Y'),
            'nama_guru' => $question_grid_header->teacher->name,
            'nip_guru' => $question_grid_header->teacher->nip,
        ]);

        // Replace mark by xml code of table
        $template_processor->setValue('table', $tablexml);
        
        $filename = 'Kisi-Kisi-Soal-'.$question_grid_header->study->name;
        $template_processor->saveAs($filename.'.docx');
        return response()->download($filename.'.docx')->deleteFileAfterSend(true);
    }


    protected function get_session($question_grid_step_number)
    {
        $user = Auth::guard('user')->user();
        return Session::get('users_id_'.$user->id.$question_grid_step_number);
    }

    protected function put_session($question_grid_step_number, $session)
    {
        $user = Auth::guard('user')->user();
        Session::put('users_id_'.$user->id.$question_grid_step_number, $session);
    }
}
