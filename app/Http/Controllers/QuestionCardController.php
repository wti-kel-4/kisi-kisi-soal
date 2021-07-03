<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionCard;
use App\Models\QuestionGrid;
use App\Models\QuestionGridHeader;
use App\Models\QuestionCardHeader;
use App\Classes\QuestionCardClass;
use App\Models\LogActivity;
use App\Models\Profile;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\PhpWord;

class QuestionCardController extends Controller
{

    public function index()
    {
        $tahun_ajaran = Session::get('tahun_ajaran');
        $question_card_headers = QuestionCardHeader::where('temp', false)->where('school_year', $tahun_ajaran)->get();
        return view('admin.question_card.index', compact('question_card_headers'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question_card = QuestionCard::find($id);
        return view('admin.question_card.show', compact('question_card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $question_card = QuestionCard::findorfail($id);
            $question_card->delete();
            return back()->with('info', 'Data berhasil dihapus');
        }catch(\Exception $e){
            return back()->with('error', 'Mata Pelajaran sedang digunakan');
        }
    }

    public function get_step_0()
    {
        $tahun_ajaran = Session::get('tahun_ajaran');
        $question_grid_headers_pts = QuestionGridHeader::where('school_year', $tahun_ajaran)->where('temp', false)->where('type', 'PTS')->get();
        $question_grid_headers_pat = QuestionGridHeader::where('school_year', $tahun_ajaran)->where('temp', false)->where('type', 'PAT')->get();
        $question_grid_headers_pkk = QuestionGridHeader::where('school_year', $tahun_ajaran)->where('temp', false)->where('type', 'PKK')->get();
        return view('user.question_card.step_0', compact('question_grid_headers_pts', 'question_grid_headers_pat', 'question_grid_headers_pkk'));
    }

    public function get_step_1($id)
    {
        // Ambil semua question_grids untuk semua data dalam tablenya
        $question_grid_header = QuestionGridHeader::find($id);

        $this->put_session('_question_card_step_1', $question_grid_header); // untuk looping kisi - kisi soal
        return view('user.question_card.step_1', compact('question_grid_header'));
    }

    public function get_step_2()
    {
        $question_card_step_1 = $this->get_session('_question_card_step_1');
        return view('user.question_card.step_2', compact('question_card_step_1'));
    }

    public function get_step_2_save(Request $request)
    {
        
        $no_soal = $request->no_soal;
        $kunci_jawaban = $request->kunci_jawaban;
        $tingkat_kesulitan = $request->tingkat_kesulitan;
        $jawaban_a = $request->jawaban_a;
        $jawaban_b = $request->jawaban_b;
        $jawaban_c = $request->jawaban_c;
        $jawaban_d = $request->jawaban_d;
        $jawaban_e = $request->jawaban_e;
        $indikator = $request->indikator;
        $indikator_soal = $request->indikator_soal;
        $soal = $request->soal;

        $question_card = new QuestionCardClass;
        $question_card->no_soal = $no_soal;
        $question_card->kunci_jawaban = $kunci_jawaban;
        $question_card->jawaban_a = $jawaban_a;
        $question_card->jawaban_b = $jawaban_b;
        $question_card->jawaban_c = $jawaban_c;
        $question_card->jawaban_d = $jawaban_d;
        $question_card->jawaban_e = $jawaban_e;
        $question_card->indikator = $indikator;
        $question_card->tingkat_kesulitan = $tingkat_kesulitan;
        $question_card->indikator_soal = $indikator_soal;
        $question_card->soal = $soal;

        if($this->has_session('_question_card_step_2')){
            $session = $this->get_session('_question_card_step_2');
            array_push($session, $question_card);
            $this->put_session('_question_card_step_2', $session);

            $temp = $this->get_session('_temp');
            $this->put_session('_temp', ($temp + 1));
        }else{
            $session = array();
            array_push($session, $question_card);
            $this->put_session('_question_card_step_2', $session);

            $temp = 1;
            $this->put_session('_temp', $temp);
        }

        return back()->with('success', 'Kartu soal tersimpan sementara, silahkan melihat progress pengerjaan di bawah form ini');
    }

    public function get_step_2_delete($i)
    {
        $session = $this->get_session('_question_card_step_2');
        array_splice($session, $i, 1);
        $this->put_session('_question_card_step_2', $session);

        $session_temp = $this->get_session('_temp');
        $session = $this->put_session('_temp', ($session_temp - 1));
        
        return back()->with('success', 'Kisi - kisi soal telah terhapus');
    }

    public function get_step_3()
    {
        // Ambil tahun ajaran yang sesuai dari session
        $tahun_ajaran = Session::get('tahun_ajaran');
        
        // Disimpan semua supaya bisa dipreview dan diurut
        $user = Auth::guard('user')->user();

        // Ambil semua session
        $session_1 = $this->get_session('_question_card_step_1'); // menyimpan question_grid acuan
        $session_2 = $this->get_session('_question_card_step_2'); // menyimpan question_card rows nya

        DB::beginTransaction();
        try{
            
            // Jika sebelumnya sudah ada dan pernah mengunjungi halaman ini maka hapus data sebelumnya dari tabel
            QuestionCard::join('question_card_headers', 'question_cards.question_card_headers_id', 'question_card_headers.id')->where('question_card_headers.teachers_id', $user->teacher->id)->where('question_card_headers.temp', true)->forceDelete();
            QuestionCardHeader::where('school_year', $tahun_ajaran)->where('teachers_id', $user->teacher->id)->where('temp', true)->forceDelete();
            
            // Buat ulang
            $question_card_header = new QuestionCardHeader; // Buat headernya dulu
            $question_card_header->teachers_id = $user->teacher->id;
            $question_card_header->grade_generalizations_id = $session_1->grade_generalizations_id;
            $question_card_header->type = $session_1->type;
            $question_card_header->semesters = $session_1->semesters;
            $question_card_header->studies_id = $session_1->studies_id;
            $question_card_header->temp = true; // Masih belum fix jadi temp true
            $question_card_header->school_year = $session_1->school_year;
            $question_card_header->profiles_id = $session_1->profile->id;
            $question_card_header->save();
            
            for($i = 0; $i < count($session_2); $i++){
                $question_card = new QuestionCard;
                $question_card->question_card_headers_id = $question_card_header->id;
                $question_card->question_grids_id = $session_2[$i]->indikator_soal;
                $question_card->indicator = $session_2[$i]->indikator;
                $question_card->rate = $session_2[$i]->tingkat_kesulitan;
                $question_card->answer_a = $session_2[$i]->jawaban_a;
                $question_card->answer_b = $session_2[$i]->jawaban_b;
                $question_card->answer_c = $session_2[$i]->jawaban_c;
                $question_card->answer_d = $session_2[$i]->jawaban_d;
                $question_card->answer_e = $session_2[$i]->jawaban_e;
                $question_card->answer_key = $session_2[$i]->kunci_jawaban;
                $question_card->question = $session_2[$i]->soal;
                $question_card->question_number = $session_2[$i]->no_soal;
                $question_card->save();
            }
            DB::commit();
        }catch(Exception $ex){
            DB::rollback();
            echo $ex->getMessage();
        }

        $question_cards = QuestionCard::where('question_card_headers_id', $question_card_header->id)->get(); // ambil rownya untuk looping    
        return view('user.question_card.step_3', compact('question_cards', 'question_card_header'));
    }

    public function get_preview($id){
        $question_card_header = QuestionCardHeader::find($id);

        $tipe = '';
        switch($question_card_header->type){
            case 'PTS' : $tipe = 'PENILAIAN TENGAH SEMESTER (PTS)'; break;
            case 'PAT' : $tipe = 'PENILAIAN AKHIR TAHUN (PAT)'; break;
            case 'PKK' : $tipe = 'PENILAIAN KENAIKAN KELAS (PKK)'; break;
        }

        // Real Document
        $template_processor = new TemplateProcessor('template/question_card.docx');

        date_default_timezone_set('Asia/Jakarta');

        $template_processor->cloneBlock('CLONEBLOCK', count($question_card_header->question_card) - 1); // dikurangi satu karena sudah ada header
        $template_processor->setValues([
            'tipe' => $tipe,
            'semester' => $question_card_header->semesters,
            'satuan_pendidikan' => $question_card_header->profile->name,
            'nama_guru' => $question_card_header->teacher->name,
            'kelas' => $question_card_header->grade_generalization->name,
            'tahun_ajaran' => $question_card_header->school_year,
        ]);

        $header = true;
        $parser = new \HTMLtoOpenXML\Parser();
        foreach($question_card_header->question_card as $question_card){
            if($header){
                $template_processor->setValue('kompetensi_dasar_once',  $question_card->question_grid->basic_competency->name, 1);
                $template_processor->setValue('indikator_kompetensi_dasar_once',  $question_card->indicator, 1);
                $template_processor->setValue('lingkup_materi_once',  $question_card->question_grid->study_lesson_scope_lesson->scope_lesson->name, 1);
                $template_processor->setValue('indikator_once',  $question_card->question_grid->indicator, 1);
                if($question_card->question_grid->level == 'L1'){
                    $template_processor->setValue('L1_once',  'v', 1);
                    $template_processor->setValue('L2_once',  '', 1);
                    $template_processor->setValue('L3_once',  '', 1);
                }else if($question_card->question_grid->level == 'L2'){
                    $template_processor->setValue('L1_once',  '', 1);
                    $template_processor->setValue('L2_once',  'v', 1);
                    $template_processor->setValue('L3_once',  '', 1);
                }else if($question_card->question_grid->level == 'L3'){
                    $template_processor->setValue('L1_once',  '', 1);
                    $template_processor->setValue('L2_once',  '', 1);
                    $template_processor->setValue('L3_once',  'v', 1);
                }
                if($question_card->rate == 'easy'){
                    $template_processor->setValue('mudah_once',  'v', 1);
                    $template_processor->setValue('sedang_once',  '', 1);
                    $template_processor->setValue('sulit_once',  '', 1);
                }else if($question_card->rate == 'medium'){
                    $template_processor->setValue('mudah_once',  '', 1);
                    $template_processor->setValue('sedang_once', 'v', 1);
                    $template_processor->setValue('sulit_once',  '', 1);
                }else if($question_card->rate == 'hard'){
                    $template_processor->setValue('mudah_once',  '', 1);
                    $template_processor->setValue('sedang_once',  '', 1);
                    $template_processor->setValue('sulit_once', 'v', 1);
                }
    
                $template_processor->setValue('jawaban_a_once',  $question_card->answer_a, 1);
                $template_processor->setValue('jawaban_b_once',  $question_card->answer_b, 1);
                $template_processor->setValue('jawaban_c_once',  $question_card->answer_c, 1);
                $template_processor->setValue('jawaban_d_once',  $question_card->answer_d, 1);
                $template_processor->setValue('jawaban_e_once',  $question_card->answer_e, 1);
                $soal = $parser->fromHTML($question_card->question);
                $template_processor->setValue('soal_once',  $soal, 1);
                $template_processor->setValue('bentuk_soal_once',  $question_card->question_grid->question_form, 1);
                $template_processor->setValue('no_soal_once',  $question_card->question_number, 1);
                $template_processor->setValue('kunci_jawaban_once',  $question_card->answer_key, 1);
                $header = false;
                continue;
            }

            // note! add the limit 1 as the third parameter (otherwise it will
            // write the this value on all of the pages)
            $template_processor->setValue('kompetensi_dasar',  $question_card->question_grid->basic_competency->name, 1);
            $template_processor->setValue('indikator_kompetensi_dasar',  $question_card->indicator, 1);
            $template_processor->setValue('lingkup_materi',  $question_card->question_grid->study_lesson_scope_lesson->scope_lesson->name, 1);
            $template_processor->setValue('indikator',  $question_card->question_grid->indicator, 1);
            if($question_card->question_grid->level == 'L1'){
                $template_processor->setValue('L1',  'v', 1);
                $template_processor->setValue('L2',  '', 1);
                $template_processor->setValue('L3',  '', 1);
            }else if($question_card->question_grid->level == 'L2'){
                $template_processor->setValue('L1',  '', 1);
                $template_processor->setValue('L2',  'v', 1);
                $template_processor->setValue('L3',  '', 1);
            }else if($question_card->question_grid->level == 'L3'){
                $template_processor->setValue('L1',  '', 1);
                $template_processor->setValue('L2',  '', 1);
                $template_processor->setValue('L3',  'v', 1);
            }
            if($question_card->rate == 'easy'){
                $template_processor->setValue('mudah',  'v', 1);
                $template_processor->setValue('sedang',  '', 1);
                $template_processor->setValue('sulit',  '', 1);
            }else if($question_card->rate == 'medium'){
                $template_processor->setValue('mudah',  '', 1);
                $template_processor->setValue('sedang', 'v', 1);
                $template_processor->setValue('sulit',  '', 1);
            }else if($question_card->rate == 'hard'){
                $template_processor->setValue('mudah',  '', 1);
                $template_processor->setValue('sedang',  '', 1);
                $template_processor->setValue('sulit', 'v', 1);
            }

            $template_processor->setValue('jawaban_a',  $question_card->answer_a, 1);
            $template_processor->setValue('jawaban_b',  $question_card->answer_b, 1);
            $template_processor->setValue('jawaban_c',  $question_card->answer_c, 1);
            $template_processor->setValue('jawaban_d',  $question_card->answer_d, 1);
            $template_processor->setValue('jawaban_e',  $question_card->answer_e, 1);
            $soal = $parser->fromHTML($question_card->question);
            $template_processor->setValue('soal',  $soal, 1);
            $template_processor->setValue('bentuk_soal',  $question_card->question_grid->question_form, 1);
            $template_processor->setValue('no_soal',  $question_card->question_number, 1);
            $template_processor->setValue('kunci_jawaban',  $question_card->answer_key, 1);
        }

        $filename = 'Preview-Kartu-Soal-'.$question_card_header->study->name;
        $template_processor->saveAs($filename.'.docx');
        return response()->download($filename.'.docx')->deleteFileAfterSend(true);
    }

    public function get_download($id){
        $question_card_header = QuestionCardHeader::find($id);

        $tipe = '';
        switch($question_card_header->type){
            case 'PTS' : $tipe = 'PENILAIAN TENGAH SEMESTER (PTS)'; break;
            case 'PAT' : $tipe = 'PENILAIAN AKHIR TAHUN (PAT)'; break;
            case 'PKK' : $tipe = 'PENILAIAN KENAIKAN KELAS (PKK)'; break;
        }

        // Real Document
        $template_processor = new TemplateProcessor('template/question_card.docx');

        date_default_timezone_set('Asia/Jakarta');

        $template_processor->cloneBlock('CLONEBLOCK', count($question_card_header->question_card) - 1); // dikurangi satu karena sudah ada header
        $template_processor->setValues([
            'tipe' => $tipe,
            'semester' => $question_card_header->semesters,
            'satuan_pendidikan' => $question_card_header->profile->name,
            'nama_guru' => $question_card_header->teacher->name,
            'kelas' => $question_card_header->grade_generalization->name,
            'tahun_ajaran' => $question_card_header->school_year,
        ]);

        $header = true;
        $parser = new \HTMLtoOpenXML\Parser();
        foreach($question_card_header->question_card as $question_card){
            if($header){
                $template_processor->setValue('kompetensi_dasar_once',  $question_card->question_grid->basic_competency->name, 1);
                $template_processor->setValue('indikator_kompetensi_dasar_once',  $question_card->indicator, 1);
                $template_processor->setValue('lingkup_materi_once',  $question_card->question_grid->study_lesson_scope_lesson->scope_lesson->name, 1);
                $template_processor->setValue('indikator_once',  $question_card->question_grid->indicator, 1);
                if($question_card->question_grid->level == 'L1'){
                    $template_processor->setValue('L1_once',  'v', 1);
                    $template_processor->setValue('L2_once',  '', 1);
                    $template_processor->setValue('L3_once',  '', 1);
                }else if($question_card->question_grid->level == 'L2'){
                    $template_processor->setValue('L1_once',  '', 1);
                    $template_processor->setValue('L2_once',  'v', 1);
                    $template_processor->setValue('L3_once',  '', 1);
                }else if($question_card->question_grid->level == 'L3'){
                    $template_processor->setValue('L1_once',  '', 1);
                    $template_processor->setValue('L2_once',  '', 1);
                    $template_processor->setValue('L3_once',  'v', 1);
                }
                if($question_card->rate == 'easy'){
                    $template_processor->setValue('mudah_once',  'v', 1);
                    $template_processor->setValue('sedang_once',  '', 1);
                    $template_processor->setValue('sulit_once',  '', 1);
                }else if($question_card->rate == 'medium'){
                    $template_processor->setValue('mudah_once',  '', 1);
                    $template_processor->setValue('sedang_once', 'v', 1);
                    $template_processor->setValue('sulit_once',  '', 1);
                }else if($question_card->rate == 'hard'){
                    $template_processor->setValue('mudah_once',  '', 1);
                    $template_processor->setValue('sedang_once',  '', 1);
                    $template_processor->setValue('sulit_once', 'v', 1);
                }
    
                $template_processor->setValue('jawaban_a_once',  $question_card->answer_a, 1);
                $template_processor->setValue('jawaban_b_once',  $question_card->answer_b, 1);
                $template_processor->setValue('jawaban_c_once',  $question_card->answer_c, 1);
                $template_processor->setValue('jawaban_d_once',  $question_card->answer_d, 1);
                $template_processor->setValue('jawaban_e_once',  $question_card->answer_e, 1);
                $soal = $parser->fromHTML($question_card->question);
                $template_processor->setValue('soal_once',  $soal, 1);
                $template_processor->setValue('bentuk_soal_once',  $question_card->question_grid->question_form, 1);
                $template_processor->setValue('no_soal_once',  $question_card->question_number, 1);
                $template_processor->setValue('kunci_jawaban_once',  $question_card->answer_key, 1);
                $header = false;
                continue;
            }

            // note! add the limit 1 as the third parameter (otherwise it will
            // write the this value on all of the pages)
            $template_processor->setValue('kompetensi_dasar',  $question_card->question_grid->basic_competency->name, 1);
            $template_processor->setValue('indikator_kompetensi_dasar',  $question_card->indicator, 1);
            $template_processor->setValue('lingkup_materi',  $question_card->question_grid->study_lesson_scope_lesson->scope_lesson->name, 1);
            $template_processor->setValue('indikator',  $question_card->question_grid->indicator, 1);
            if($question_card->question_grid->level == 'L1'){
                $template_processor->setValue('L1',  'v', 1);
                $template_processor->setValue('L2',  '', 1);
                $template_processor->setValue('L3',  '', 1);
            }else if($question_card->question_grid->level == 'L2'){
                $template_processor->setValue('L1',  '', 1);
                $template_processor->setValue('L2',  'v', 1);
                $template_processor->setValue('L3',  '', 1);
            }else if($question_card->question_grid->level == 'L3'){
                $template_processor->setValue('L1',  '', 1);
                $template_processor->setValue('L2',  '', 1);
                $template_processor->setValue('L3',  'v', 1);
            }
            if($question_card->rate == 'easy'){
                $template_processor->setValue('mudah',  'v', 1);
                $template_processor->setValue('sedang',  '', 1);
                $template_processor->setValue('sulit',  '', 1);
            }else if($question_card->rate == 'medium'){
                $template_processor->setValue('mudah',  '', 1);
                $template_processor->setValue('sedang', 'v', 1);
                $template_processor->setValue('sulit',  '', 1);
            }else if($question_card->rate == 'hard'){
                $template_processor->setValue('mudah',  '', 1);
                $template_processor->setValue('sedang',  '', 1);
                $template_processor->setValue('sulit', 'v', 1);
            }

            $template_processor->setValue('jawaban_a',  $question_card->answer_a, 1);
            $template_processor->setValue('jawaban_b',  $question_card->answer_b, 1);
            $template_processor->setValue('jawaban_c',  $question_card->answer_c, 1);
            $template_processor->setValue('jawaban_d',  $question_card->answer_d, 1);
            $template_processor->setValue('jawaban_e',  $question_card->answer_e, 1);
            $soal = $parser->fromHTML($question_card->question);
            $template_processor->setValue('soal',  $soal, 1);
            $template_processor->setValue('bentuk_soal',  $question_card->question_grid->question_form, 1);
            $template_processor->setValue('no_soal',  $question_card->question_number, 1);
            $template_processor->setValue('kunci_jawaban',  $question_card->answer_key, 1);
        }

        $filename = 'Kartu-Soal-'.$question_card_header->study->name;
        $template_processor->saveAs($filename.'.docx');
        return response()->download($filename.'.docx')->deleteFileAfterSend(true);
    }

    public function get_step_finish($id)
    {
        DB::beginTransaction();
        try{
            $question_card_header = QuestionCardHeader::find($id);
            // Jika sudah pernah dicatat jangan catat lagi
            if($question_card_header->temp == true){
                $question_card_header->temp = false; // Simpan permanen
                $question_card_header->save();

                $log_activity_users = new LogActivity;
                $log_activity_users->question_grid_headers_id = $question_card_header->id;
                $log_activity_users->action = 'make';
                $log_activity_users->users_id = Auth::guard('user')->user()->id;
                $log_activity_users->save();
            }
            DB::commit();
        }catch(Exception $ex){
            DB::rollback();
        }
        
        return redirect()->route('user.dashboard.index')->with('success', 'Kartu soal berhasil dibuat!');
    }

    protected function has_session($question_grid_step_number)
    {
        $user = Auth::guard('user')->user();
        return Session::has('users_id_'.$user->id.$question_grid_step_number);
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
