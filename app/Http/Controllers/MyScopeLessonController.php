<?php

namespace App\Http\Controllers;

use App\Models\ScopeLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyScopeLessonController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('user')->user();
        $scope_lessons = ScopeLesson::orderBy('created_at', 'desc')->get();
        
        if (Auth::guard('user')->user() != null) {
            return view('user.my_scope_lesson.index', compact('scope_lessons'));
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.scope_lesson.index', compact('scope_lessons'));
        }
        else {
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if (Auth::guard('user')->user() != null) {
            return view('user.my_scope_lesson.create');
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.scope_lesson.create');
        }
        else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'scope_lesson_name' => 'required'
        ]);

        if($validate){
            ScopeLesson::create([
                'name' => $request->scope_lesson_name,
            ]);
            
            if (Auth::guard('user')->user() != null) {
                return redirect()->route('user.my-scope-lesson.index')->with('success', 'Berhasil menambahkan data.');
            }elseif (Auth::guard('admin')->user() != null) {
                return redirect()->route('admin.scope-lesson.index')->with('success', 'Berhasil menambahkan data.');
            }
            else {
                return back();
            }
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
        
        $scope_lesson = ScopeLesson::findorfail($id);
        
        if (Auth::guard('user')->user() != null) {
            return view('user.my_scope_lesson.edit', compact('scope_lesson'));
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.scope_lesson.edit', compact('scope_lesson'));
        }
        else {
            return back();
        }
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
            'edit_scope_lesson_name' => 'required',
        ]);

        $scope_lesson = ScopeLesson::findorfail($id);
        $scope_lesson->update([
            'name' => $request->edit_scope_lesson_name,
        ]);
        
        if (Auth::guard('user')->user() != null) {
            return redirect()->route('user.my-scope-lesson.index')->with('success', 'Berhasil Mengubah Data.');
        }elseif (Auth::guard('admin')->user() != null) {
            return redirect()->route('admin.scope-lesson.index')->with('success', 'Berhasil Mengubah Data.');
        }
        else {
            return back();
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
        $scope_lesson = ScopeLesson::find($id);
        $scope_lesson->delete();
        
        if (Auth::guard('user')->user() != null) {
            return redirect()->route('user.my-scope-lesson.index')->with('success', 'Berhasil Menghapus Data.');
        }elseif (Auth::guard('admin')->user() != null) {
            return redirect()->route('admin.scope-lesson.index')->with('success', 'Berhasil Menghapus Data.');
        }
        else {
            return back();
        }
    }
}
