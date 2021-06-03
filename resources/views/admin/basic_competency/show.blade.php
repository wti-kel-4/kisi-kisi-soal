@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Kompetensi Dasar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.basic-competency.index') }}">Kompetensi Dasar</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form>
                        <div class="card-header">
                            <h4>Detail Kompetensi Dasar</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Kompetensi Dasar</label>
                                <textarea style="resize: none; height: 10em;" disabled name="name" class="form-control" required="">{{$basic_competency->name}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select disabled name="studies_id" id="name" class="form-control">
                                    @foreach ($studies as $study)
                                    <option 
                                    @if ($basic_competency->study->id == $study->id)
                                        selected    
                                    @endif
                                    value="{{$study->id}}">{{$study->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select disabled name="grade_generalizations_id" id="name" class="form-control">
                                    @foreach ($grade_generalizations as $grade_generalization)
                                    <option 
                                    @if ($basic_competency->grade_generalization->id == $grade_generalization->id)
                                        selected    
                                    @endif
                                    value="{{$grade_generalization->id}}">{{$grade_generalization->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')

@endsection