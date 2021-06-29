<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicCompetency;
use App\Models\GradeGeneralization;
use App\Models\Study;
use Illuminate\Support\Facades\Auth;

class BasicCompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basic_competencies = BasicCompetency::orderBy('created_at', 'desc')->get();
        if (Auth::guard('user')->user() != null) {
            return view('user.basic_competency.index', compact('basic_competencies'))->with('study');
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.basic_competency.index', compact('basic_competencies'))->with('study');
        }
        else {
            return back();
        }
        // return view('admin.basic_competency.index', compact('basic_competencies'))->with('study');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study = Study::all();
        $grade_generalizations = GradeGeneralization::all();
        if (Auth::guard('user')->user() != null) {
            return view('user.basic_competency.create', compact('study', 'grade_generalizations'));
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.basic_competency.create', compact('study', 'grade_generalizations'));
        }
        else {
            return back();
        }
        // return view('admin.basic_competency.create', compact('study', 'grade_generalizations'));
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
            'name' => 'required',
            'studies_id' => 'required',
        ]);


        if ($validate) {
            BasicCompetency::create($request->all());
    
            if (Auth::guard('user')->user() != null) {
                return redirect()->route('user.basic-competency.index')->with('success', 'Berhasil menambahkan data.');
            }elseif (Auth::guard('admin')->user() != null) {
                return redirect()->route('admin.basic-competency.index')->with('success', 'Berhasil menambahkan data.');
            }
            else {
                return back();
            }
            
        }
        // return redirect()->route('admin.basic-competency.index')->with('success', 'Berhasil menambahkan data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id) {
            $basic_competency = BasicCompetency::find($id);
            $studies = Study::all();
            $grade_generalizations = GradeGeneralization::all();

            if (Auth::guard('user')->user() != null) {
                return view('user.basic_competency.show', compact('basic_competency', 'studies', 'grade_generalizations'));
            }elseif (Auth::guard('admin')->user() != null) {
                return view('admin.basic_competency.show', compact('basic_competency', 'studies', 'grade_generalizations'));
            }
            else {
                return back();
            }
            // return view('admin.basic_competency.show', compact('basic_competency', 'studies', 'grade_generalizations'));
        }
        
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
        $grade_generalizations = GradeGeneralization::all();

        if (Auth::guard('user')->user() != null) {
            return view('user.basic_competency.edit', compact('basic_competencies', 'study', 'grade_generalizations'));
        }elseif (Auth::guard('admin')->user() != null) {
            return view('admin.basic_competency.edit', compact('basic_competencies', 'study', 'grade_generalizations'));
        }
        else {
            return back();
        }
        // return view('admin.basic_competency.edit', compact('basic_competencies', 'study', 'grade_generalizations'));
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
        $validate = $request->validate([
            'name' => 'required',
            'studies_id' => 'required',
        ]);

        if ($validate) {
            $basic_competency = BasicCompetency::findorfail($id);
            $basic_competency->update($request->all());
    
            if (Auth::guard('user')->user() != null) {
                return redirect()->route('user.basic-competency.index')->with('success', 'Berhasil mengedit data.');
            }elseif (Auth::guard('admin')->user() != null) {
                return redirect()->route('admin.basic-competency.index')->with('success', 'Berhasil mengedit data.');
            }
            else {
                return back();
            }
        }
        
        // return redirect()->route('admin.basic-competency.index')->with('success', 'Berhasil mengedit data.');
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

        $basic_competency->delete();

        if (Auth::guard('user')->user() != null) {
            return redirect()->route('user.basic-competency.index')->with('success', 'Berhasil menghapus data.');
        }elseif (Auth::guard('admin')->user() != null) {
            return redirect()->route('admin.basic-competency.index')->with('success', 'Berhasil menghapus data.');
        }
        else {
            return back();
        }
        // return redirect()->route('admin.basic-competency.index')->with('success', 'Berhasil menghapus data.');
    }
}
