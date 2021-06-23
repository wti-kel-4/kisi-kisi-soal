<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyLessonController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::guard('user')->user();
        $lessons = Lesson::orderBy('created_at', 'desc')->get();
        
        if (Auth::guard('user')->user() != null) {
            return view('user.my_lesson.index', compact('lessons'));
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.lesson.index', compact('lessons'));
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
            return view('user.my_lesson.create');
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.lesson.create');
        }
        else {
            return back();
        }
        // return view('user.my_lesson.create');
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
            'lesson_name' => 'required'
        ]);

        if($validate){
            Lesson::create([
                'name' => $request->lesson_name,
            ]);
            if (Auth::guard('user')->user() != null) {
                return redirect()->route('user.my-lesson.index')->with('success', 'Berhasil menambahkan data.');
            }elseif (Auth::guard('admin')->user() != null) {
                return redirect()->route('admin.lesson.index')->with('success', 'Berhasil menambahkan data.');
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
        // dd($id);
        $lesson = Lesson::findorfail($id);
        if (Auth::guard('user')->user() != null) {
            return view('user.my_lesson.update', compact('lesson'));
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.lesson.update', compact('lesson'));
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
            'edit_lesson_name' => 'required',
        ]);

        $lesson = Lesson::findorfail($id);
        $lesson->update([
            'name' => $request->edit_lesson_name,
        ]);
        
        if (Auth::guard('user')->user() != null) {
            return redirect()->route('user.my-lesson.index')->with('success', 'Berhasil Mengubah Data.');
        }elseif (Auth::guard('admin')->user() != null) {
            return redirect()->route('admin.lesson.index')->with('success', 'Berhasil Mengubah Data.');
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
        $lesson = Lesson::find($id);
        $lesson->delete();
        if (Auth::guard('user')->user() != null) {
            return redirect()->route('user.my-lesson.index')->with('success', 'Berhasil Menghapus Data.');
        }elseif (Auth::guard('admin')->user() != null) {
            return redirect()->route('admin.lesson.index')->with('success', 'Berhasil Menghapus Data.');
        }
        else {
            return back();
        }
    }
}
