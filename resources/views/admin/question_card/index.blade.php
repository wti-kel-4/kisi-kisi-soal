@extends('admin.master.main')
@section('title')
  Kartu Soal | SIM Kisi - Kisi & Kartu Soal
@endsection
@section('style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
@endsection
@section('body')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Data Kartu Soal</h1>
        </div>
        <div class="row">
            <div class="col-12">
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
                  Kartu Soal
                </div>
                <div class="card-body">
                  <div class="splide" id="splide-kartu-soal">
                    <div class="splide__track">
                      <ul class="splide__list">
                        @if ($question_card_headers->count() > 0)
                          @foreach ($question_card_headers as $question_card_header)
                            <li class="splide__slide m-2">
                              <a href="{{ url('user/question-card/download/'.$question_card_header->id) }}">
                                @if ($question_card_header->type == 'PTS')
                                  <div class="card card-info">
                                @endif
                                @if ($question_card_header->type == 'PAT')
                                  <div class="card card-success">
                                @endif
                                @if ($question_card_header->type == 'PKK')
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
                            </li>
                          @endforeach
                        @else
                          <li class="splide__slide m-2">Tidak ada data kartu soal yang tersedia</li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>     
    </section>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
new Splide( '#splide-kartu-soal', {
	perPage: 3,
	perMove: 1,
} ).mount();
</script>
<!-- Page Specific JS File -->
{{-- <script src="{{ asset('assets/js/page/modules-slider.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/page/index.js') }}"></script> --}}
@endsection