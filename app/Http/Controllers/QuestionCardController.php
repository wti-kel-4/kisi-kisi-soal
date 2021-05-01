<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionCard;
use App\Models\QuestionGrid;

class QuestionCardController extends Controller
{
    public function index()
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