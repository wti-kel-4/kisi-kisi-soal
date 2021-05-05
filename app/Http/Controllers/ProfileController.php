<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.index');
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
        // $study = Study::all();
        // return view('admin.basic_competency.edit', compact('basic_competencies', 'study'));
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
        $request->validate([
        'username' => 'required',
        'password' => 'required|confirmed',
        ]);
        $user = User::findorfail($id);   
        
        if($request->url_photo){
            $imagesName = time().'.'.$request->url_photo->extension();
            Storage::putFileAs(
                'public/images',
                $request->file('url_photo'),
                $imagesName,
            );
        }

        $user->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'url_photo' => $imagesName,
            // 'url_photo' => fopen($resorce, 'r'),
        ]);
        return redirect()->route('profile.index')
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
