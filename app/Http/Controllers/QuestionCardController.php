<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionCard;
use App\Models\QuestionGrid;
use App\Models\QuestionCardHeader;
use App\Models\QuestionGridHeader;
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
        $question_grid_headers_pts = QuestionGridHeader::where('temp', false)->where('type', 'PTS')->get();
        $question_grid_headers_pat = QuestionGridHeader::where('temp', false)->where('type', 'PAT')->get();
        $question_grid_headers_pkk = QuestionGridHeader::where('temp', false)->where('type', 'PKK')->get();
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
