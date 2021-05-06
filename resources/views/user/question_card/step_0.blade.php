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
                      @if ($question_grids->count() > 0)
                      <div class="owl-carousel owl-theme row" id="products-carousel">
                        @foreach ($question_grids as $question_grid)
                        @if ($question_grid->type == 'PTS')
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <a href="{{ route('question_card_step_1', [$question_grid->type, $question_grid->school_year, $question_grid->form, $question_grid->studies_id, $question_grid->grade_specializations_id, $question_grid->teachers_id]) }}">
                              <div class="card card-info">
                              <div class="card-header container">
                                <div class="row">
                                  <h4 class="col-12">{{ $question_grid->type }} {{ $question_grid->school_year }}</h4>
                                  <p class="col-12">{{ $question_grid->study->name }} ({{ $question_grid->grade_specialization->name }})</p>
                                  <p class="col-12 text-success">
                                    @if ($question_grid->form == 'pg')
                                        Pilihan Ganda
                                    @endif
                                    @if ($question_grid->form == 'jumble')
                                        Menjodohkan
                                    @endif
                                    @if ($question_grid->form == 'isian')
                                        Isian
                                    @endif
                                    @if ($question_grid->form == 'uraian')
                                        Uraian
                                    @endif
                                  </p>
                                </div>
                              </div>
                              <div class="card-body">
                                  <p class="text-dark">Dibuat Oleh : {{ $question_grid->teacher->name }}</p>
                              </div>
                              </div>
                            </a>   
                          </div>
                        @endif
                        @endforeach
                      </div>
                      @else
                          Tidak ada data kisi - kisi soal yang tersedia
                      @endif
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      PAT (Penilaian Akhir Tahun)
                    </div>
                    <div class="card-body">
                      @if ($question_grids->count() > 0)
                        <div class="owl-carousel owl-theme row" id="products-carousel">
                          @foreach ($question_grids as $question_grid)
                          @if ($question_grid->type == 'PAT')
                            <div class="col-sm-12 col-md-4 col-lg-4">
                              <a href="{{ route('question_card_step_1', [$question_grid->type, $question_grid->school_year, $question_grid->form, $question_grid->studies_id, $question_grid->grade_specializations_id, $question_grid->teachers_id]) }}">
                                <div class="card card-info">
                                <div class="card-header container">
                                  <div class="row">
                                    <h4 class="col-12">{{ $question_grid->type }} {{ $question_grid->school_year }}</h4>
                                    <p class="col-12">{{ $question_grid->study->name }} ({{ $question_grid->grade_specialization->name }})</p>
                                    <p class="col-12 text-success">
                                      @if ($question_grid->form == 'pg')
                                          Pilihan Ganda
                                      @endif
                                      @if ($question_grid->form == 'jumble')
                                          Menjodohkan
                                      @endif
                                      @if ($question_grid->form == 'isian')
                                          Isian
                                      @endif
                                      @if ($question_grid->form == 'uraian')
                                          Uraian
                                      @endif
                                    </p>
                                  </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-dark">Dibuat Oleh : {{ $question_grid->teacher->name }}</p>
                                </div>
                                </div>
                              </a>   
                            </div>
                          @endif
                          @endforeach
                        </div>
                      @else
                        Tidak ada data kisi - kisi soal yang tersedia
                      @endif
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      PKK (Penilaian Kenaikan Kelas)
                    </div>
                    <div class="card-body">
                      @if ($question_grids->count() > 0)
                        <div class="owl-carousel owl-theme row" id="products-carousel">
                          @foreach ($question_grids as $question_grid)
                          @if ($question_grid->type == 'PKK')
                            <div class="col-sm-12 col-md-4 col-lg-4">
                              <a href="{{ route('question_card_step_1', [$question_grid->type, $question_grid->school_year, $question_grid->form, $question_grid->studies_id, $question_grid->grade_specializations_id, $question_grid->teachers_id]) }}">
                                <div class="card card-info">
                                <div class="card-header container">
                                  <div class="row">
                                    <h4 class="col-12">{{ $question_grid->type }} {{ $question_grid->school_year }}</h4>
                                    <p class="col-12">{{ $question_grid->study->name }} ({{ $question_grid->grade_specialization->name }})</p>
                                    <p class="col-12 text-success">
                                      @if ($question_grid->form == 'pg')
                                          Pilihan Ganda
                                      @endif
                                      @if ($question_grid->form == 'jumble')
                                          Menjodohkan
                                      @endif
                                      @if ($question_grid->form == 'isian')
                                          Isian
                                      @endif
                                      @if ($question_grid->form == 'uraian')
                                          Uraian
                                      @endif
                                    </p>
                                  </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-dark">Dibuat Oleh : {{ $question_grid->teacher->name }}</p>
                                </div>
                                </div>
                              </a>   
                            </div>
                          @endif
                          @endforeach
                        </div>
                      @else
                        Tidak ada data kisi - kisi soal yang tersedia
                      @endif
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection