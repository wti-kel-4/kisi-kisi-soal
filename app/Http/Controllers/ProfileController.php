<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LogActivity;
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

    public function view_log()
    {
        $log_activities = LogActivity::all();
        return view('admin.log_activity.index', compact('log_activities'))->with('question_grid', 'question_card','user');
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
        $validateData = $request->validate([
        'password' => 'required|confirmed',
        ]);

        $user = User::findorfail($id);   

        $this->imagesName = $user->url_photo;
        $this->userName = $user->username;

        
        if($request->url_photo){
            $imagesName = time().'.'.$request->url_photo->extension();
            Storage::putFileAs(
                'public/images',
                $request->file('url_photo'),
                $imagesName,
            );
        }else{
            $imagesName = $this->imagesName;
        }

        if($request->username){
            $this->userName = $request->username;
        }

        if($validateData){
            $user->update([
                'username' => $this->userName,
                'password' => Hash::make($request->password),
                'url_photo' => $imagesName,
            ]);
            return redirect()->route('profile.index')
                                ->with('success', 'Berhasil mengedit data.');
        }else{
            return redirect()->route('profile.edit')
                                ->with('error', 'Password Tidak Sesuai.');
        }
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
