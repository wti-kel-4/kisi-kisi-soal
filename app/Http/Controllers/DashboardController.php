<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard');
        } else if (Auth::guard('user')->check()) {
            return view('user.dashboard');
        }else{
            return back();
        }
    }
}
