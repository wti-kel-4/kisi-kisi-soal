@extends('user.master.main')
@php
  use Illuminate\Support\Facades\Auth;
  $user = Auth::guard('user')->user();
  $question_card_step_2 = session('teachers_id_'.$user->id.'_question_card_step_2');
  if(session()->has('teachers_id_'.$user->id.'_temp')){
    $qty_question_card = session('teachers_id_'.$user->id.'_temp');
  }else{
    $qty_question_card = 0;
  }
@endphp
@section('style')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/codemirror/lib/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/codemirror/theme/duotone-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/selectric/public/selectric.css') }}">
@endsection
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Kedua</h1>
          </div>
          <div class="section-body">
            @include('user.master.alert_success')
            @include('user.master.alert_error')
            @include('user.master.alert_info')
            <h2 class="section-title">Lengkapi Data Kartu Soal ({{ $qty_question_card }} Kartu Soal)</h2>
            <p class="section-lead">Tuliskan nomor soal, buku sumber, rumusan soal, indikator dan pilih KD, Materi</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body pb-0">
                    <form action="{{ route('question_card_step_2.save') }}" method="POST">
                      @csrf
                      <div class="row">
                        {{-- <div class="col-lg-2 col-md-2">

                          <div class="form-group">
                            <label>Kunci Jawaban</label>
                            <select name="kunci_jawaban" class="form-control">
                              <option selected disabled>Kunci</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                              <option value="E">E</option>
                            </select>
                          </div>
                        </div> --}}
                        <div class="col-lg-3 col-md-3">
                          <div class="form-group">
                            <label>No Soal</label>
                            <input name="no_soal" type="number" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Bentuk Soal</label>
                            <select name="bentuk" class="form-control" disabled>
                              @if ($question_card_step_1_one->form == 'pg')
                                  <option selected>Pilihan Ganda (PG)</option>
                              @endif
                              @if ($question_card_step_1_one->form == 'isian')
                                  <option selected >Isian</option>
                              @endif
                              @if ($question_card_step_1_one->form == 'jumble')
                                  <option selected>Menjodohkan</option>
                              @endif
                              @if ($question_card_step_1_one->form == 'uraian')
                                  <option selected>Uraian</option>
                              @endif
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Buku Sumber 1</label>
                            <input name="buku_sumber_1" type="text" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Buku Sumber 2</label>
                            <input name="buku_sumber_2" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                          <div class="form-group">
                            <label>Kompetensi Dasar</label>
                            <select name="kompetensi_dasar" class="form-control select2">
                                <option selected disabled>Pilih Kompetensi Dasar yang akan digunakan</option>
                                @foreach ($question_card_step_1_basic_competencies as $question_card)
                                    <option value="{{ $question_card->basic_competency->id }}">{{ $question_card->basic_competency->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Materi</label>
                            <select name="materi" class="form-control">
                              @if ($question_card_step_1_all == null)
                                  <option selected disabled>Anda tidak memiliki materi dari kelas yang Anda pilih</option>
                                @endif
                              @foreach ($question_card_step_1_lessons as $question_card)
                                  <option value="{{ $question_card->lesson->id }}">{{ $question_card->lesson->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Indikator</label>
                            <textarea name="indikator" class="form-control" style="min-width:10px; min-height:140px;" placeholder="Tuliskan indikator yang dibutuhkan di kisi - kisi soal ini"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="card card-info">
                        <div class="card-header">
                          <h4>Rumusan Soal</h4>
                          <div class="card-header-action">
                              <button class="btn btn-icon icon-right btn-success w-100">Simpan Data <i class="fas fa-save"></i></button>
                          </div>
                        </div>
                        <div class="card-body my-0 py-0">
                          <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                              <textarea class="summernote"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                    <div class="row card-footer">
                      <div class="col text-left">
                        <a href="{{ route('question_card_step_1', [$question_card_step_1_one->type, $question_card_step_1_one->school_year, $question_card_step_1_one->form, $question_card_step_1_one->studies_id, $question_card_step_1_one->grade_specializations_id, $question_card_step_1_one->teachers_id]) }}" class="btn btn-icon icon-right btn-primary"><i class="fas fa-arrow-left"></i>Kembali Ke Step Sebelumnya</a>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('question_card_step_2') }}" class="btn btn-icon icon-right btn-primary">Simpan & Validasi <i class="fas fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="section-header">
            <h6>Kartu Soal Yang Dibuat</h6>
          </div>
          {{-- <div class="section-body">
            <div class="row">
            @if ($question_grid_step_2 != null)
              @for($i = (count($question_grid_step_2) - 1); $i >= 0; $i--)
                @if (!empty($question_grid_step_2[$i]))
                <div class="col-lg-4 col-sm-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4>No Urut : {{ $question_grid_step_2[$i]->no_urut }}</h4>
                    </div>
                    <div class="card-body">
                      <h6>Indikator (No. Soal : {{ $question_grid_step_2[$i]->dari_no }} s/d {{ $question_grid_step_2[$i]->sampai_no }})</h6>
                      {{ $question_grid_step_2[$i]->indikator }}
                    </div>
                    <div class="card-footer text-right row">
                      <form action="{{ route('question_grid_step_2.delete', $i)}}" class="w-100" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="col-lg-4 col-md-4 col-sm-4 btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
                @endif()
              @endfor
            @else
            <div class="col">
              <div class="card">
                  <div class="card-body">
                    Mash belum ada kisi - kisi soal di mata pelajaran ini yang pernah Anda buat
                  </div>
              </div>
            </div>
            @endif
            </div>
          </div> --}}
        </section>
      </div>
@endsection
@section('script')
  <!-- JS Libraies -->
  <script src="{{ asset('node_modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('node_modules/codemirror/lib/codemirror.js') }}"></script>
  <script src="{{ asset('node_modules/codemirror/mode/javascript/javascript.js') }}"></script>
  <script src="{{ asset('node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
@endsection