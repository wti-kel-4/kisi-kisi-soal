<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public $imagesName = '';
    public $userName;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.index');
    }

    public function view_log_user()
    {
        $user = Auth::guard('user')->user();
        $log_activities = LogActivity::where('users_id', $user->id)->orWhere('used_for_users_id', $user->id)->orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('user.log_activity.index', compact('log_activities'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findorfail($id);
        
        return view('user.profile.edit', compact('users'));
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
        $user = User::findorfail($id);   
        if($request->url_photo){
            $file = $request->file('url_photo');
            $tujuan_upload = 'user/photo';
            $file->move($tujuan_upload, $file->getClientOriginalName());
            
            if($user->url_photo != null || $user->url_photo != ''){
                $file_path = public_path().'/'.$user->url_photo;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
            }
            
            $user->url_photo = 'user/photo/'.$file->getClientOriginalName();
        }

        if($request->has('username')){
            $user->username = $request->username;
        }

        if($request->has('password') && $request->has('password_confirmation')){
            if(isset($request->password) && isset($request->password_confirmation)){
                if($request->password == $request->password_confirmation){
                    $user->password = Hash::make($request->password);
                }else{
                    return redirect()->route('user.profile.edit', ['profile' => $user->id])
                        ->with('error', 'Password Tidak Sesuai.');
                }
            }
            
        }
        $user->save();

        return redirect()->route('user.profile.index')
        ->with('success', 'Berhasil mengedit data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
