@extends('user.master.main')
@section('title')
  Step 2 : Kisi - Kisi Soal
@endsection
@php
  use Illuminate\Support\Facades\Auth;
  $user = Auth::guard('user')->user();
  $question_grid_step_2 = session('users_id_'.$user->id.'_question_grid_step_2');
  if(session()->has('users_id_'.$user->id.'_temp')){
    $qty_question_grid = session('users_id_'.$user->id.'_temp');
  }else{
    $qty_question_grid = 0;
  }
@endphp
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
            <h2 class="section-title">Lengkapi Data Kisi - Kisi Soal ({{ $qty_question_grid }} Kisi - Kisi)</h2>
            <p class="section-lead">Tuliskan No urut, KD, Materi, Indikator Soal, Bentuk Soal, No Soal secara urut</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form action="{{ route('user.question_grid_step_2.save') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-lg-5 col-md-5">
                          <div class="form-group">
                            <label>Kompetensi Dasar</label>
                            <select name="kompetensi_dasar" class="form-control select2">
                                <option selected disabled>Pilih Kompetensi Dasar yang berkaitan</option>
                                @foreach ($basic_competencies as $basic_competency)
                                    <option value="{{ $basic_competency->id }}">{{ $basic_competency->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Lingkup Materi</label>
                            <select name="lingkup_materi" class="form-control select2">
                              @if (count($scope_lessons) == 0)
                                  <option selected disabled>Anda tidak memiliki materi dari kelas yang Anda pilih</option>
                              @endif
                              @foreach ($scope_lessons as $scope_lesson)
                                  <option value="{{ $scope_lesson->scope_lesson->id }}">{{ $scope_lesson->scope_lesson->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Materi</label>
                            <select name="materi" class="form-control select2">
                              @if (count($lessons) == 0)
                                  <option selected disabled>Anda tidak memiliki materi dari kelas yang Anda pilih</option>
                                @endif
                              @foreach ($lessons as $lesson)
                                  <option value="{{ $lesson->lesson->id }}">{{ $lesson->lesson->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>No Soal</label>
                                <input name="no_soal" type="number" class="form-control">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control">
                                      <option value="L1">L1 (Pengetahuan & Pemahaman)</option>
                                      <option value="L2">L2 (Aplikasi)</option>
                                      <option value="L3">L3 (Penalaran)</option>
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Kognitif</label>
                                <select name="kognitif" class="form-control">
                                      <option value="C1">C1 (Pengetahuan)</option>
                                      <option value="C2">C2 (Pemahaman)</option>
                                      <option value="C3">C3 (Penerapan)</option>
                                      <option value="C4">C4 (Analisis)</option>
                                      <option value="C5">C5 (Penilaian)</option>
                                      <option value="C6">C6 (Kreasi)</option>
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Bentuk Soal</label>
                                <select name="bentuk" class="form-control">
                                      <option value="pg">Pilihan Ganda (PG)</option>
                                      <option value="isian">Isian</option>
                                      <option value="jumble">Menjodohkan</option>
                                      <option value="uraian">Uraian</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Indikator Soal</label>
                            <textarea name="indikator" class="form-control" style="min-width:10px; min-height:100px;" placeholder="Tuliskan indikator yang dibutuhkan di kisi - kisi soal ini"></textarea>
                          </div>
                          <div class="col p-0 m-0">
                            <button class="btn btn-icon icon-right btn-success w-100">Simpan Data <i class="fas fa-save"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer">
                    <div class="row card-footer">
                      <div class="col text-left">
                        <a href="{{ route('user.question_grid_step_1') }}" class="btn btn-icon icon-right btn-primary"><i class="fas fa-arrow-left"></i>Kembali Ke Step Sebelumnya</a>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('user.question_grid_step_3') }}" class="btn btn-icon icon-right btn-primary">Simpan & Validasi <i class="fas fa-arrow-right"></i></a>
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
            <h6>Kisi - Kisi Soal Yang Dibuat</h6>
          </div>
          <div class="section-body">
            <div class="row">
            @if ($question_grid_step_2 != null)
              @for($i = (count($question_grid_step_2) - 1); $i >= 0; $i--)
                @if (!empty($question_grid_step_2[$i]))
                <div class="col-lg-4 col-sm-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4>No Soal : {{ $question_grid_step_2[$i]->no_soal }}</h4>
                    </div>
                    <div class="card-body">
                      <h6>Level Kognitif : {{ $question_grid_step_2[$i]->level }}/{{ $question_grid_step_2[$i]->kognitif }}</h6>
                      {{ $question_grid_step_2[$i]->indikator }}
                    </div>
                    <div class="card-footer text-right row">
                      <form action="{{ route('user.question_grid_step_2.delete', $i)}}" class="w-100" method="POST">
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
          </div>
        </section>
      </div>
@endsection