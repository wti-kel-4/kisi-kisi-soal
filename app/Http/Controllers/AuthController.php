<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
      if (Auth::guard('admin')->check()) {
        return redirect('/admin/dashboard');
      } else if (Auth::guard('user')->check()) {
        return redirect('/user/dashboard');
      }
      return view('general.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'username' => ['required'],
          'password' => ['required'],
        ]);

      if($validator->fails())
      {
          return back();
      }

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/admin/dashboard');
        } else if (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/user/dashboard');
        }
        return redirect()->back();
    }

    public function logout()
    {
      if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
        return redirect('login');
      } else if (Auth::guard('user')->check()) {
        Auth::guard('user')->logout();
        return redirect('login');
      }
      return redirect('login');
    }
}
