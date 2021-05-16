<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            
            return view('user.dashboard');
        }else{
            return back();
        }
    }
}
