<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionCard;
use App\Models\QuestionGrid;
use App\Models\Profile;

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
        $question_grids = QuestionGrid::SelectAndGroupBy()->get();
        return view('user.question_card.step_0', compact('question_grids'));
    }

    public function get_step_1($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)
    {
        // Ambil semua question_grids untuk semua data dalam tablenya
        $question_grids = QuestionGrid::WhereCardParam($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)->get();
        // Ambil satu question_grids untuk headernya
        $question_grid = QuestionGrid::WhereCardParam($type, $school_year, $form, $studies_id, $grade_specializations_id, $teachers_id)->first();
        // Ambil profile object
        $profile = Profile::first();
        return view('user.question_card.step_1', compact('profile', 'question_grid', 'question_grids'));
    }
}
