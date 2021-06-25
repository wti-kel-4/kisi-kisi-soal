@extends('user.master.main')
@section('title')
  Kompetensi Dasar
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kompetensi Dasar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('user.basic-competency.index') }}">Kompetensi Dasar</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('user.basic-competency.update', $basic_competencies->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field()}}
                        <div class="card-header">
                            <h4>Ubah Data Kompetensi Dasar</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb">
                            <label>Nama Kompetensi Dasar</label>
                            <textarea style="resize: none; height: 10em;" name="name" class="form-control" required="">{{$basic_competencies->name}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select name="studies_id" id="name" class="form-control">
                                    <option selected value="{{$basic_competencies->study->id}}">{{$basic_competencies->study->name}}</option>
                                    @foreach ($study as $study)
                                    <option value="{{$study->id}}">{{$study->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="grade_generalizations_id" id="name" class="form-control">
                                    <option selected value="{{$basic_competencies->grade_generalization->id}}">{{$basic_competencies->grade_generalization->name}}</option>
                                    @foreach ($grade_generalizations as $grade_generalization)
                                    <option value="{{$grade_generalization->id}}">{{$grade_generalization->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
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