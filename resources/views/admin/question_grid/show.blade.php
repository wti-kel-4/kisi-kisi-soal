@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Kisi - Kisi Soal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('question-grid.index') }}">Kisi Soal</a></div>
            </div>
            </div>
            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Data</h4>
                        </div>
                        <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Guru</label>
                                <div class="col-sm-10">
                                <select disabled name="teachers_id" id="name" class="form-control">
                                    <option selected value="{{$question_grid->teacher->id}}">{{$question_grid->teacher->name}}</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Untuk Ujian</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_grid->type}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                <select disabled name="studies_id" id="name" class="form-control">
                                    <option selected value="{{$question_grid->study->id}}">{{$question_grid->study->name}}</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Durasi Pengerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_grid->time_allocation}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Total Soal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_grid->total}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_grid->school_year}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kompetensi Dasar</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_grid->basic_competency->name}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Indikator</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_grid->indicator}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Dari Soal Nomor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_grid->start_number}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Sampai Soal Nomor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_grid->end_number}}" disabled>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')

@endsection