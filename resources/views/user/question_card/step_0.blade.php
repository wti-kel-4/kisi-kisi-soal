@extends('user.master.main')
@section('title')
  Kartu Soal
@endsection
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Data Kisi - Kisi Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Pilih salah satu kisi - kisi soal untuk membuat kartu soal baru</h2>
            <p class="section-lead">PTS, PAT, PKK</p>
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      PTS (Penilaian Tengah Semester)
                    </div>
                    <div class="card-body">
                      @if ($question_grid_headers_pts->count() > 0)
                      <div class="owl-carousel owl-theme row" id="products-carousel">
                        @foreach ($question_grid_headers_pts as $question_grid_header)
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <a href="{{ route('user.question_card_step_1', [$question_grid_header->id]) }}">
                              <div class="card card-info">
                              <div class="card-header container">
                                <div class="row">
                                  <h4 class="col-12">{{ $question_grid_header->type }} {{ $question_grid_header->school_year }}</h4>
                                  <p class="col-12">{{ $question_grid_header->study->name }} ({{ $question_grid_header->grade_generalization->name }} / {{ $question_grid_header->semesters }})</p>
                                  <p class="col-12 text-success">
                                    Kurikulum : {{ $question_grid_header->curriculum }}
                                  </p>
                                </div>
                              </div>
                              <div class="card-body">
                                  <p class="text-dark">Dibuat Oleh : {{ $question_grid_header->teacher->name }}</p>
                              </div>
                              </div>
                            </a>   
                          </div>
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
                      @if ($question_grid_headers_pat->count() > 0)
                      <div class="owl-carousel owl-theme row" id="products-carousel">
                        @foreach ($question_grid_headers_pat as $question_grid_header)
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <a href="{{ route('user.question_card_step_1', [$question_grid_header->id]) }}">
                              <div class="card card-info">
                              <div class="card-header container">
                                <div class="row">
                                  <h4 class="col-12">{{ $question_grid_header->type }} {{ $question_grid_header->school_year }}</h4>
                                  <p class="col-12">{{ $question_grid_header->study->name }} ({{ $question_grid_header->grade_generalization->name }} / {{ $question_grid_header->semesters }})</p>
                                  <p class="col-12 text-success">
                                    Kurikulum : {{ $question_grid_header->curriculum }}
                                  </p>
                                </div>
                              </div>
                              <div class="card-body">
                                  <p class="text-dark">Dibuat Oleh : {{ $question_grid_header->teacher->name }}</p>
                              </div>
                              </div>
                            </a>   
                          </div>
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
                      @if ($question_grid_headers_pkk->count() > 0)
                      <div class="owl-carousel owl-theme row" id="products-carousel">
                        @foreach ($question_grid_headers_pkk as $question_grid_header)
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <a href="{{ route('user.question_card_step_1', [$question_grid_header->id]) }}">
                              <div class="card card-info">
                              <div class="card-header container">
                                <div class="row">
                                  <h4 class="col-12">{{ $question_grid_header->type }} {{ $question_grid_header->school_year }}</h4>
                                  <p class="col-12">{{ $question_grid_header->study->name }} ({{ $question_grid_header->grade_generalization->name }} / {{ $question_grid_header->semesters }})</p>
                                  <p class="col-12 text-success">
                                    Kurikulum : {{ $question_grid_header->curriculum }}
                                  </p>
                                </div>
                              </div>
                              <div class="card-body">
                                  <p class="text-dark">Dibuat Oleh : {{ $question_grid_header->teacher->name }}</p>
                              </div>
                              </div>
                            </a>   
                          </div>
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