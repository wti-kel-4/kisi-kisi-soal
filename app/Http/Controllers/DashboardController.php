<?php

namespace App\Http\Controllers;

use App\Models\BasicCompetency;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\QuestionGrid;
use App\Models\QuestionGridHeader;
use App\Models\QuestionCard;
use App\Models\QuestionCardHeader;
use App\Models\Study;
use App\Models\Teacher;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $count_user = User::count();
            $count_grade = Grade::count();
            $count_study = Study::count();
            $count_teacher = Teacher::count();
            $count_basic_competency = BasicCompetency::count();
            $count_question_grid = QuestionGridHeader::count();
            $count_question_card = QuestionCard::count();
            return view('admin.dashboard', compact('count_user', 'count_grade', 'count_study', 'count_teacher', 'count_basic_competency', 'count_question_grid', 'count_question_card'));
        } else if (Auth::guard('user')->check()) {
            $user = Auth::guard('user')->user();
            // For general
            if(Session::has('users_id_'.$user->id.'_temp')){
                Session::forget('users_id_'.$user->id.'_temp');
            }
            
            // For step question grid
            if(Session::has('users_id_'.$user->id.'_question_grid_step_0')){
                Session::forget('users_id_'.$user->id.'_question_grid_step_0');
            }
            if(Session::has('users_id_'.$user->id.'_question_grid_header_step_1')){
                Session::forget('users_id_'.$user->id.'_question_grid_header_step_1');
            }
            if(Session::has('users_id_'.$user->id.'_question_grid_step_2')){
                Session::forget('users_id_'.$user->id.'_question_grid_step_2');
            }

            // Jika sebelumnya sudah ada dan pernah mengunjungi halaman question_grid maka hapus data sebelumnya dari tabel
            QuestionGrid::join('question_grid_headers', 'question_grids.question_grid_headers_id', 'question_grid_headers.id')->where('question_grid_headers.teachers_id', $user->teacher->id)->where('question_grid_headers.temp', true)->forceDelete();
            QuestionGridHeader::where('teachers_id', $user->teacher->id)->where('temp', true)->forceDelete();
            
            // Jika sebelumnya sudah ada dan pernah mengunjungi halaman ini maka hapus data sebelumnya dari tabel
            QuestionCard::join('question_card_headers', 'question_cards.question_card_headers_id', 'question_card_headers.id')->where('question_card_headers.teachers_id', $user->teacher->id)->where('question_card_headers.temp', true)->forceDelete();
            QuestionCardHeader::where('teachers_id', $user->teacher->id)->where('temp', true)->forceDelete();

            // For step question card
            if(Session::has('users_id_'.$user->id.'_question_card_step_1')){
                Session::forget('users_id_'.$user->id.'_question_card_step_1');
            }
            if(Session::has('users_id_'.$user->id.'_question_card_step_2')){
                Session::forget('users_id_'.$user->id.'_question_card_step_2');
            }

            $question_grid_headers = QuestionGridHeader::where('teachers_id', $user->teacher->id)->where('temp', false)->get();
            $question_card_headers = QuestionCardHeader::where('teachers_id', $user->teacher->id)->where('temp', false)->get();
            return view('user.dashboard', compact('question_grid_headers', 'question_card_headers'));
        }else{
            return back();
        }
    }
}
