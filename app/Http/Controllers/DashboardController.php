<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\QuestionGrid;
use App\Models\QuestionGridHeader;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard');
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

            $question_grid_header = QuestionGridHeader::where('teachers_id', $user->teacher->id)->where('temp', false)->get();
            return view('user.dashboard', compact('question_grid_header'));
        }else{
            return back();
        }
    }
}
