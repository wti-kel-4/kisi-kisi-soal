<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionGrid;
use App\Models\Profile;
use App\Models\Study;
use Auth;

class QuestionGridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question_grids = QuestionGrid::orderBy('created_at', 'DESC')->get();
        return view('admin.question_grid.index', compact('question_grids'));
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
        //
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
        //
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

    public function get_step_1()
    {
        $profile = Profile::first();
        $teachers_id = Auth::guard('user')->user()->teacher->id;
        $studies = Study::where('teachers_id', $teachers_id)->get();
        return view('user.question_grid.step_1', compact('profile', 'studies'));
    }

    public function get_step_2()
    {
        return view('user.question_grid.step_2');
    }

    public function get_step_3()
    {
        return view('user.question_grid.step_3');
    }
}