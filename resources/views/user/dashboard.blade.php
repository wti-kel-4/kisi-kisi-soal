@extends('user.master.main')
@section('body')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Dashboard User</h1>
        </div>
        @include('user.master.alert_success')
        @include('user.master.alert_error')
        @include('user.master.alert_info')
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Kisi Kisi Soal Anda</h4>
                        </div>
                        <div class="card-body">
                        {{ count($question_grid_headers) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Kartu Soal Anda</h4>
                        </div>
                        <div class="card-body">
                            {{ count($question_card_headers) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  Kisi - Kisi Soal
                </div>
                <div class="card-body">
                  @if ($question_grid_headers->count() > 0)
                  <div class="owl-carousel owl-theme row" id="products-carousel">
                    @foreach ($question_grid_headers as $question_grid_header)
                      <div class="col-sm-12 col-md-4 col-lg-4">
                        <a href="{{ url('user/question-grid/download/'.$question_grid_header->id) }}">
                          @if ($question_grid_header->type == 'PTS')
                            <div class="card card-info">
                          @endif
                          @if ($question_grid_header->type == 'PAT')
                            <div class="card card-success">
                          @endif
                          @if ($question_grid_header->type == 'PKK')
                            <div class="card card-dark">
                          @endif
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
                            <p class="text-dark">Klik Untuk Download</p>
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
                  Kartu Soal
                </div>
                <div class="card-body">
                  @if ($question_card_headers->count() > 0)
                  <div class="owl-carousel owl-theme row" id="products-carousel">
                    @foreach ($question_card_headers as $question_card_header)
                      <div class="col-sm-12 col-md-4 col-lg-4">
                        <a href="{{ url('user/question-card/download/'.$question_card_header->id) }}">
                            @if ($question_grid_header->type == 'PTS')
                            <div class="card card-info">
                          @endif
                          @if ($question_grid_header->type == 'PAT')
                            <div class="card card-success">
                          @endif
                          @if ($question_grid_header->type == 'PKK')
                            <div class="card card-dark">
                          @endif
                          <div class="card-header container">
                            <div class="row">
                              <h4 class="col-12">{{ $question_card_header->type }} {{ $question_card_header->school_year }}</h4>
                              <p class="col-12">{{ $question_card_header->study->name }} ({{ $question_card_header->grade_generalization->name }} / {{ $question_card_header->semesters }})</p>
                              <p class="col-12 text-success">
                                Kurikulum : {{ $question_card_header->curriculum }}
                              </p>
                            </div>
                          </div>
                          <div class="card-body">
                              <p class="text-dark">Klik Untuk Download</p>
                          </div>
                          </div>
                        </a>   
                      </div>
                    @endforeach
                  </div>
                  @else
                      Tidak ada data kartu soal yang tersedia
                  @endif
                </div>
              </div>
            </div>
        </div>     
    </section>
</div>
@endsection
@section('script')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index-0.js') }}"></script>
@endsection