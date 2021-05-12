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
        $basic_competency = BasicCompetency::find($id);
        $studies = Study::all();
        return view('admin.basic_competency.show', compact('basic_competency', 'studies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $basic_competencies = BasicCompetency::findorfail($id);
        $study = Study::all();
        return view('admin.basic_competency.edit', compact('basic_competencies', 'study'));
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
        'name' => 'required',
        'studies_id' => 'required',
        ]);

        $basic_competency = BasicCompetency::findorfail($id);
        $basic_competency->update($request->all());
        return redirect()->route('admin.basic-competency.index')
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
        $basic_competency = BasicCompetency::findorfail($id);
        // Hapus yang lain
        // BasicCompetency::where('id', '!=', $id)->where('studies_id', $basic_competency->studies_id)->orWhere('grade_generalizations_id', $basic_competency->grade_generalizations_id)->delete();
        // Hapus yang terpilih
        $basic_competency->delete();
        return redirect()->route('admin.basic-competency.index')
                            ->with('success', 'Berhasil menghapus data.');
    }
}
