<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionCard;
use App\Models\QuestionGrid;

class QuestionCardController extends Controller
{

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
        $question_grids = QuestionGrid::select('teachers_id', 'studies_id', 'type', 'school_year', 'grade_specializations_id')
                                        ->groupBy('teachers_id')
                                        ->groupBy('type')
                                        ->groupBy('studies_id')
                                        ->groupBy('school_year')
                                        ->groupBy('grade_specializations_id')
                                        ->orderBy('sorting_number')
                                        ->get();
        return view('user.question_card.index', compact('question_grids'));
    }
}
