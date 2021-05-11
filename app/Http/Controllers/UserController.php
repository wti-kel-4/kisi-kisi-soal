<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::orderBy('name', 'DESC')->get();
        return view('admin.user.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                                    'teachers_id' => ['required', 'exists:teachers,id'],
                                    'username' => ['required'],
                                    'password' => ['required'],
                                ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $teachers_id = $request->teachers_id;
        $username = $request->username;
        $password = $request->password;

        // Cek apabila username sudah ada
        $user_check = User::where('username', $username)->first();
        if($user_check != null){
            return back()->with('error', 'Username '.$username.' sudah digunakan, silahkan mencoba mendaftar dengan username yang lain lagi');
        }

        DB::beginTransaction();
        try{
            $user_new = new User;
            $user_new->teachers_id = $teachers_id;
            $user_new->username = $username;
            $user_new->password = Hash::make($password);
            $user_new->save();
            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Berhasil mendaftarkan user '.$username);
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal mendaftarkan user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $teachers = Teacher::all();
        return view('admin.user.show', compact('user', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $teachers = Teacher::all();
        return view('admin.user.edit', compact('user', 'teachers'));
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
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'teachers_id' => ['required', 'exists:teachers,id'],
            'username' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('error', 'Form ada yang belum terisi!');
        }

        $id = $request->id;
        $teachers_id = $request->teachers_id;
        $username = $request->username;
        $password = $request->password;

        // Cek apabila username sudah ada
        $user_check = User::where('username', $username)->where('id', '!=', $id)->first();
        if($user_check != null){
            return back()->with('error', 'Username '.$username.' sudah digunakan, silahkan mencoba mendaftar dengan username yang lain lagi');
        }

        DB::beginTransaction();
        try{
            $user = User::find($id);
            $user->teachers_id = $teachers_id;
            $user->username = $username;
            if($password != null || $password != ''){
                $user->password = Hash::make($password);
            }
            
            if($request->has('file')){
                $file = $request->file('file');
                $tujuan_upload = 'user/photo';
                $file->move($tujuan_upload, $file->getClientOriginalName());
                
                if($user->url_photo != null || $user->url_photo != ''){
                    $file_path = public_path().'/'.$user->url_photo;
                    unlink($file_path);
                }
                
                $user->url_photo = 'user/photo/'.$file->getClientOriginalName();
            }
            $user->save();
            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Berhasil mendaftarkan user '.$username);
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal mendaftarkan user');
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
        DB::beginTransaction();
        try{
            $user = User::find($id);
            if($user == null){
                return back()->with('error', 'ID user tidak ditemukan');    
            }
            if($user->url_photo != null || $user->url_photo != ''){
                $file_path = public_path().'/'.$user->url_photo;
                unlink($file_path);
            }
            $user->delete();
            DB::commit();
            return back()->with('success', 'Berhasil menghapus data user');
        }catch(Exception $ex){
            DB::rollback();
            return back()->with('error', 'Gagal menghapus data user');
        }
    }
}
