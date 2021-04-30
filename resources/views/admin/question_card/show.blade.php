@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Kartu Soal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('question-card.index') }}">Kartu Soal</a></div>
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
                                <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_card->question_grid->study->name}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Kompetensi Dasar</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_card->question_grid->basic_competency->name}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Indikator</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_card->question_grid->indicator }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Nomor Soal</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{$question_card->number}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Buku Referensi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{ $question_card->reference_book_1 }}; {{ $question_card->reference_book_2 }}; {{ $question_card->reference_book_3 }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Pertanyaan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_card->question}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Kunci</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$question_card->key}}" disabled >
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Pilihan ganda(a)</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_card->answer_a}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Pilihan ganda(b)</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_card->answer_b}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Pilihan ganda(c)</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_card->answer_c}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Pilihan ganda(d)</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" disabled>{{$question_card->answer_d}}</textarea>
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