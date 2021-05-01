@extends('user.master.main')
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Kartu Soal</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      PTS (Penilaian Tengah Semester)
                    </div>
                    <div class="card-body">
                      @foreach ($question_grids as $question_grid)
                        @if ($question_grid->type == 'PTS')
                        <div class="row">
                          <a class="col-12 col-md-6 col-lg-4" href="{{ route('get_question_grid', $question_grid->type, $question_grid->studies_id, $question_grid->grade_specializations_id, $question_grid->teachers_id, $question_grid->school_year) }}">
                            <div class="card card-info">
                            <div class="card-header container">
                              <div class="row">
                                <h4 class="col-12">{{ $question_grid->type }} {{ $question_grid->school_year }}</h4>
                                <p class="col-12">{{ $question_grid->study->name }} ({{ $question_grid->grade_specialization->name }})</p>
                              </div>
                            </div>
                            <div class="card-body">
                                <p>Dibuat Oleh : {{ $question_grid->teacher->name }}</p>
                            </div>
                            </div>
                          </a>
                        </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      PAT (Penilaian Akhir Tahun)
                    </div>
                    <div class="card-body">
                      @foreach ($question_grids as $question_grid)
                        @if ($question_grid->type == 'PAT')
                        <div class="row">
                          <a class="col-12 col-md-6 col-lg-4" href="{{ route('get_question_grid', $question_grid->type, $question_grid->studies_id, $question_grid->grade_specializations_id, $question_grid->teachers_id, $question_grid->school_year) }}">
                            <div class="card card-success">
                            <div class="card-header">
                              <div class="row">
                                  <h4 class="col-12">{{ $question_grid->type }} {{ $question_grid->school_year }}</h4>
                                  <p class="col-12">{{ $question_grid->study->name }} ({{ $question_grid->grade_specialization->name }})</p>
                                </div>
                              </div>
                            </div>
                            <div class="card-body">
                                <p>Dibuat Oleh : {{ $question_grid->teacher->name }}</p>
                            </div>
                            </div>
                          </a>
                        </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      PKK (Penilaian Kenaikan Kelas)
                    </div>
                    <div class="card-body">
                      @foreach ($question_grids as $question_grid)
                        @if ($question_grid->type == 'PKK')
                        <div class="row">
                          <a class="col-12 col-md-6 col-lg-4" href="{{ route('get_question_grid', $question_grid->type, $question_grid->studies_id, $question_grid->grade_specializations_id, $question_grid->teachers_id, $question_grid->school_year) }}">
                            <div class="card card-dark">
                            <div class="card-header">
                              <div class="row">
                                <h4 class="col-12">{{ $question_grid->type }} {{ $question_grid->school_year }}</h4>
                                <p class="col-12">{{ $question_grid->study->name }} ({{ $question_grid->grade_specialization->name }})</p>
                              </div>
                            </div>
                            </div>
                            <div class="card-body">
                                <p>Dibuat Oleh : {{ $question_grid->teacher->name }}</p>
                            </div>
                            </div>
                          </a>
                        </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection