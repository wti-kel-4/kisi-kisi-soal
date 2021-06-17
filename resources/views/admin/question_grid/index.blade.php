@extends('admin.master.main')
@section('title')
  Kisi - Kisi Soal | SIM Kisi - Kisi & Kartu Soal
@endsection
@section('style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
@endsection
@section('body')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Data Kisi - Kisi Soal</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Kisi Kisi Soal Sampai Saat Ini</h4>
                        </div>
                        <div class="card-body">
                        {{ count($question_grid_headers) }}
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
                  <div class="splide" id="splide-kisi-soal">
                    <div class="splide__track">
                      <ul class="splide__list">
                        @if ($question_grid_headers->count() > 0)
                          @foreach ($question_grid_headers as $question_grid_header)
                            <li class="splide__slide m-2">
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
                            </li>
                          @endforeach
                        @else
                          <li class="splide__slide m-2">Tidak ada data kisi - kisi soal yang tersedia</li>
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
  new Splide( '#splide-kisi-soal', {
	perPage: 3,
	perMove: 1,
} ).mount();

</script>
<!-- Page Specific JS File -->
{{-- <script src="{{ asset('assets/js/page/modules-slider.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/page/index.js') }}"></script> --}}
@endsection