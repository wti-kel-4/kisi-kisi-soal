@extends('user.master.main')
@php
  use Illuminate\Support\Facades\Auth;
  $user = Auth::guard('user')->user();
  $question_grid_step_2 = session('teachers_id_'.$user->id.'_question_grid_step_2');
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
            <h2 class="section-title">Lengkapi Data Kisi - Kisi Soal (0/{{ $total_question_grid }})</h2>
            <p class="section-lead">Tuliskan No urut, KD, Materi, Indikator Soal, Bentuk Soal, No Soal secara urut</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form action="{{ route('question_grid_step_2.save') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-lg-1 col-md-1">
                          <div class="form-group">
                            <label>No Urut</label>
                            <input name="no_urut" type="number" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                          <div class="form-group">
                            <label>Kompetensi Dasar</label>
                            <select name="kompetensi_dasar" class="form-control select2">
                                @foreach ($basic_competencies as $basic_competency)
                                    <option value="{{ $basic_competency->id }}">{{ $basic_competency->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Materi</label>
                            <select name="materi" class="form-control">
                              @if (count($lessons) == 0)
                                  <option selected disabled>Anda tidak memiliki materi dari kelas yang Anda pilih</option>
                                @endif
                              @foreach ($lessons as $lesson)
                                  <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Indikator Soal</label>
                            <textarea name="indikator" class="form-control" style="min-width:10px; min-height:100px;" placeholder="Tuliskan indikator yang dibutuhkan di kisi - kisi soal ini"></textarea>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                          <div class="form-group">
                            <label>Bentuk Soal</label>
                            <select name="bentuk" class="form-control" required>
                              <option value="pg">Pilihan Ganda (PG)</option>
                              <option value="isian" >Isian</option>
                              <option value="jumble" >Menjodohkan</option>
                              <option value="uraian" >Uraian</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>No Soal Dari</label>
                            <input name="dari_no" type="number" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Sampai No Soal</label>
                            <input name="sampai_no" type="number" class="form-control">
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
                        <a href="{{ route('question_grid_step_1') }}" class="btn btn-icon icon-right btn-primary"><i class="fas fa-arrow-left"></i>Kembali Ke Step Sebelumnya</a>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('question_grid_step_2') }}" class="btn btn-icon icon-right btn-primary">Selanjutnya <i class="fas fa-arrow-right"></i></a>
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
          @if ($question_grid_step_2 != null)
            @for($i = 0; $i < count($question_grid_step_2); $i++)
              <div class="card">
                <div class="card-body">
                  {{ $question_grid_step_2[$i]->no_urut }}
                </div>
              </div>
            @endfor
          @else
            <div class="card">
                <div class="card-body">
                  Mash belum ada kisi - kisi soal di mata pelajaran ini yang pernah Anda buat
                </div>
              </div>
          @endif
          </div>
        </section>
      </div>
@endsection