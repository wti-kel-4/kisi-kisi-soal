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
        return view('user.my_scope_lesson.index', compact('scope_lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.my_scope_lesson.create');
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
            return redirect()->route('user.my-scope-lesson.index')
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
        $scope_lesson = ScopeLesson::findorfail($id);
        return view('user.my_scope_lesson.edit', compact('scope_lesson'));
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
        return redirect()->route('user.my-scope-lesson.index')
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
        $scope_lesson = ScopeLesson::find($id);
        $scope_lesson->delete();
        return redirect()->route('user.my-scope-lesson.index')->with('success', 'Berhasil Menghapus Data');
    }
}
