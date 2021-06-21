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
        return view('user.my_lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.my_lesson.create');
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
            return redirect()->route('user.my-lesson.index')
                                ->with('success', 'Berhasil menambahkan data.');
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
        return view('user.my_lesson.update', compact('lesson'));
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
        return redirect()->route('user.my-lesson.index')
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
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->route('user.my-lesson.index')->with('success', 'Berhasil Menghapus Data');
    }
}
