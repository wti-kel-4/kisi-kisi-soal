<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicCompetency;
use App\Models\Study;

class BasicCompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basic_competencies = BasicCompetency::all();
        return view('admin.basic_competency.index', compact('basic_competencies'))->with('study');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study = Study::all();
        return view('admin.basic_competency.create', compact('study'));
        // return view('admin.basic_competency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'studies_id' => 'required',
        ]);


        BasicCompetency::create($request->all());
        return redirect()->route('basic-competency.index')
                            ->with('success', 'Berhasil menambahkan data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $basic_competencies = BasicCompetency::find($id);
        return view('admin.basic_competency.show', compact('basic_competencies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('basic-competency.edit', compact('basic_competency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Request $request, BasicCompetency $basic_competencies)
    {
        $request->validate([
        'name' => 'required',
        'studies_id' => 'required',
        ]);

        $basic_competencies->update($request->all());
        return redirect()->route('basic-competency.index')
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
        BasicCompetency::find($id)->delete();
        return redirect()->route('basic-competency.index')
                            ->with('success', 'Berhasil menghapus data.');
    }
}
