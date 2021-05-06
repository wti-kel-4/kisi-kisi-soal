<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionCard;
use App\Models\QuestionGrid;
use App\Models\Profile;
use Auth;
use Session;

class QuestionCardController extends Controller
{

    public function index()
    {
        $question_cards = QuestionCard::orderBy('number', 'ASC')->get();
        return view('admin.question_card.index', compact('question_cards'))->with('question_grid');
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
        $question_grids = QuestionGrid::AdvancedSelect()->AdvancedGroupBy()->get();
        return view('user.question_card.step_0', compact('question_grids'));
    }

    public function get_step_1($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)
    {
        // Ambil semua question_grids untuk semua data dalam tablenya
        $question_grids_all = QuestionGrid::WhereCardParam($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)
                                            ->get();
        $question_grids = QuestionGrid::select('indicator AS indikator', 'sorting_number AS no_urut')
                                        ->WhereCardParam($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)
                                        ->groupBy('indicator', 'sorting_number')
                                        ->orderBy('sorting_number')
                                        ->get();
        $question_grids_basic_competencies = QuestionGrid::select('basic_competencies_id')
                                                ->WhereCardParam($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)
                                                ->orderBy('created_at', 'DESC')
                                                ->distinct()
                                                ->get();
        
        $question_grids_lessons = QuestionGrid::select('lessons_id')
                                                ->WhereCardParam($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)
                                                ->orderBy('created_at', 'DESC')
                                                ->distinct()
                                                ->get();
        
        foreach($question_grids as $question_grid){
            $i = 1;
            foreach($question_grids_all as $question_grids_one){
                if($question_grid->indikator == $question_grids_one->indicator){
                    $question_grid->{'kompetensi_dasar_'.$i} = $question_grids_one->basic_competency->name;
                    $question_grid->materi = $question_grids_one->lesson->name;
                    $question_grid->bentuk = $question_grids_one->form;
                    $question_grid->dari_no= $question_grids_one->start_number;
                    $question_grid->sampai_no = $question_grids_one->end_number;
                    $i++;
                }
            }
        }

        // Ambil satu question_grids untuk headernya
        $question_grid = QuestionGrid::WhereCardParam($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)->first();
        // Ambil profile object
        $profile = Profile::first();

        $this->put_session('_question_card_step_1_all', $question_grids_all); // untuk looping kisi - kisi soal
        $this->put_session('_question_card_step_1_basic_competencies', $question_grids_basic_competencies); // Untuk mengambil kd dan materi yang berbeda
        $this->put_session('_question_card_step_1_lessons', $question_grids_lessons); // Untuk mengambil kd dan materi yang berbeda
        $this->put_session('_question_card_step_1_one', $question_grid); // untuk header kartu soal
        $this->put_session('_profile', $profile);
        return view('user.question_card.step_1', compact('profile', 'question_grid', 'question_grids'));
    }

    public function get_step_2()
    {
        $question_card_step_1_all = $this->get_session('_question_card_step_1_all');
        $question_card_step_1_one = $this->get_session('_question_card_step_1_one');
        $question_card_step_1_basic_competencies = $this->get_session('_question_card_step_1_basic_competencies');
        $question_card_step_1_lessons = $this->get_session('_question_card_step_1_lessons');
        return view('user.question_card.step_2', compact('question_card_step_1_all', 'question_card_step_1_one', 'question_card_step_1_basic_competencies', 'question_card_step_1_lessons'));
    }

    public function get_step_2_save()
    {
        $no_soal = $request->no_soal;
        $kunci = $request->kunci;
        $jawaban_a = $request->jawaban_a;
        $jawaban_b = $request->jawaban_b;
        $jawaban_c = $request->jawaban_c;
        $jawaban_d = $request->jawaban_d;
        $jawaban_e = $request->jawaban_e;
        $buku_sumber_1 = $request->buku_sumber_1;
        $buku_sumber_2 = $request->buku_sumber_2;
        $materi = $request->materi;
        $indikator = $request->indikator;
        $kompetensi_dasar = $request->kompetensi_dasar;

        $question_card = new QuestionCardClass;
        $question_card->kompetensi_dasar = $kompetensi_dasar;
        $question_card->no_soal = $no_soal;
        $question_card->kunci = $kunci;
        $question_card->jawaban_a = $jawaban_a;
        $question_card->jawaban_b = $jawaban_b;
        $question_card->jawaban_c = $jawaban_c;
        $question_card->jawaban_d = $jawaban_d;
        $question_card->jawaban_e = $jawaban_e;
        $question_card->buku_sumber_1 = $buku_sumber_1;
        $question_card->buku_sumber_2 = $buku_sumber_2;
        $question_card->materi = $materi;
        $question_card->indikator = $indikator;
        $this->put_session('_question_card_step_2', $question_card);

        return back()->with('success', 'Kartu soal tersimpan sementara, silahkan melihat progress pengerjaan di bawah form ini');
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
