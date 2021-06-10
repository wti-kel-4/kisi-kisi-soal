@extends('user.master.main')
@php
  use Illuminate\Support\Facades\Auth;
  $user = Auth::guard('user')->user();
  $question_card_step_2 = session('users_id_'.$user->id.'_question_card_step_2');
  if(session()->has('users_id_'.$user->id.'_temp')){
    $qty_question_card = session('users_id_'.$user->id.'_temp');
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
                    <form action="{{ route('user.question_card_step_2.save') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                          <div class="form-group">
                            <label>Indikator Soal</label>
                            <select name="indikator_soal" class="form-control select2">
                                <option selected disabled>Pilih Indikator Soal yang akan digunakan</option>
                                @foreach ($question_card_step_1->question_grid as $question_grid)
                                    <option value="{{ $question_grid->id }}">{{ $question_grid->indicator }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Indikator Pencapaian Kompetensi</label>
                            <textarea name="indikator" class="form-control" style="min-width:10px; min-height:150px;" placeholder="Tuliskan indikator yang dibutuhkan di kisi - kisi soal ini"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="card card-info">
                        <div class="card-header">
                          <h4>Rumusan Soal</h4>
                        </div>
                        <div class="card-body my-0 py-0 row">
                          <div class="col-sm-12 col-md-9 col-lg-9 pt-2">
                            <div class="form-group">
                              <label>No Soal</label>
                              <input name="no_soal" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Tingkat Kesulitan</label>
                              <select name="tingkat_kesulitan" class="form-control">
                                <option selected disabled>Tingkat Kesulitan</option>
                                <option value="easy">Mudah</option>
                                <option value="medium">Sedang</option>
                                <option value="hard">Sulit</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <textarea name="soal" class="summernote"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-4 col-lg-3 pt-2">
                            <div class="form-group">
                              <label> Jawaban A</label>
                              <input type="text" class="form-control" name="jawaban_a">
                            </div>
                            <div class="form-group">
                              <label> Jawaban B</label>
                              <input type="text" class="form-control" name="jawaban_b">
                            </div>
                            <div class="form-group">
                              <label> Jawaban C</label>
                              <input type="text" class="form-control" name="jawaban_c">
                            </div>
                            <div class="form-group">
                              <label> Jawaban D</label>
                              <input type="text" class="form-control" name="jawaban_d">
                            </div>
                            <div class="form-group">
                              <label> Jawaban E</label>
                              <input type="text" class="form-control" name="jawaban_e">
                            </div>
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
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                    <div class="row card-footer">
                      <div class="col text-right">
                        <button class="btn btn-icon icon-right btn-success">Simpan Data <i class="fas fa-save"></i></button>
                      </div>
                    </div>
                    <div class="row card-footer">
                      <div class="col text-left">
                        <a href="{{ route('user.question_card_step_1', [$question_card_step_1->id]) }}" class="btn btn-icon icon-right btn-primary"><i class="fas fa-arrow-left"></i>Kembali Ke Step Sebelumnya</a>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('user.question_card_step_3') }}" class="btn btn-icon icon-right btn-primary">Simpan & Validasi <i class="fas fa-arrow-right"></i></a>
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
          <div class="section-body">
            <div class="row">
            @if ($question_card_step_2 != null)
              @for($i = (count($question_card_step_2) - 1); $i >= 0; $i--)
                @if (!empty($question_card_step_2[$i]))
                <div class="col-lg-4 col-sm-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4>No Soal: {{ $question_card_step_2[$i]->no_soal }}</h4>
                    </div>
                    <div class="card-body">
                      <h6>Indikator Soal : </h6>
                      @php
                          $question_grid = \App\Models\QuestionGrid::find($question_card_step_2[$i]->indikator_soal);
                          if($question_grid == null){
                            echo 'Indikator soal tidak ditemukan';
                          }else{
                            echo $question_grid->indicator;
                          }
                      @endphp
                      <br>
                      <h6>Indikator Pencapaian Kompetensi : </h6>
                      {{ $question_card_step_2[$i]->indikator}}
                    </div>
                    <div class="card-footer text-right row">
                      <form action="{{ route('user.question_card_step_2.delete', $i)}}" class="w-100" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="col-lg-4 col-md-4 col-sm-4 btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
                @endif
              @endfor
            @else
            <div class="col">
              <div class="card">
                  <div class="card-body">
                    Masih belum ada kartu soal di mata pelajaran ini yang pernah Anda buat
                  </div>
              </div>
            </div>
            @endif
            </div>
          </div>
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