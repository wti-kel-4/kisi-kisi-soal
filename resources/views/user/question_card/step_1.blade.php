@extends('user.master.main')
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Pertama</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Verifikasi Data Kisi - Kisi Soal</h2>
            <p class="section-lead">Lihat Ulang Data, Apakah data ini yang dimaksud?</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="container">
                      <div class="row w-100">
                        <div class="col-12 col-sm-12 text-center">
                          <h5>Kisi - Kisi Soal</h5>
                        </div>
                        <div class="col-12 col-sm-12 text-center">
                          <h4>{{ $question_grid->type }} {{ $question_grid->school_year }}</h4>
                        </div>
                      </div>
                      <div class="row w-100 mt-3">
                        <div class="col-md-6 col-sm-12">
                          <div class="container">
                            <div class="row">
                              <div class="col">
                                Satuan Pendidikan
                              </div>
                              <div class="col">
                                : {{ $profile->name }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Mata Pelajaran
                              </div>
                              <div class="col">
                                : {{ $question_grid->study->name }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Kelas / Semester
                              </div>
                              <div class="col">
                                : {{ $question_grid->grade_specialization->name }}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="container">
                            <div class="row">
                              <div class="col">
                                Alokasi Waktu
                              </div>
                              <div class="col">
                                : {{ $question_grid->time_allocation }} menit
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Jumlah Soal
                              </div>
                              <div class="col">
                                : {{ $question_grid->total }} 
                                @if ($question_grid->form == 'pg')
                                    PG
                                @endif
                                @if ($question_grid->form == 'isian')
                                    Isian
                                @endif
                                @if ($question_grid->form == 'uraian')
                                    Uraian
                                @endif
                                @if ($question_grid->form == 'jumble')
                                    Menjodohkan
                                @endif
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Tahun Pelajaran
                              </div>
                              <div class="col">
                                : {{ $question_grid->school_year }}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
  
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                          <tr>
                            <th scope="col">No Urut</th>
                            <th scope="col">Kompetensi Dasar</th>
                            <th scope="col">Materi</th>
                            <th scope="col">Indikator Soal</th>
                            <th scope="col">Bentuk Soal</th>
                            <th scope="col">No Soal</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($question_grids != null)
                            @php
                                $i = 0;
                            @endphp
                            @foreach($question_grids as $question_grid)
                              @if (!empty($question_grid))
                              <tr>
                                <th scope="row">{{ $question_grid->no_urut }}</th>
                                <td>
                                  {{ $question_grid->kompetensi_dasar_1 }}
                                  <br /><br /> {{ $question_grid->kompetensi_dasar_2 }}
                                  <br /><br /> {{ $question_grid->kompetensi_dasar_3 }}
                                  <br />
                                </td>
                                <td>{{ $question_grid->materi }}</td>
                                <td>{{ $question_grid->indikator }}</td>
                                <td>
                                  @if ($question_grid->bentuk == 'pg')
                                    Pilihan Ganda                                      
                                  @endif
                                  @if ($question_grid->bentuk == 'isian')
                                    Isian
                                  @endif
                                  @if ($question_grid->bentuk == 'jumble')
                                    Menjodohkan
                                  @endif
                                  @if ($question_grid->bentuk == 'uraian')
                                    Uraian
                                  @endif
                                </td>
                                <td>{{ $question_grid->dari_no }} s/d {{ $question_grid->sampai_no }}</td>
                              </tr>
                              @endif
                            @endforeach
                          @else
                            <tr class="text-center">
                              <th scope="row" colspan="6">Masih Belum Ada Data</th>
                            </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer row">
                    <div class="col-lg-4 col-sm-12 my-1">
                      <a href="{{ route('user.dashboard') }}" class="btn btn-icon icon-right btn-danger w-100"><i class="fas fa-arrow-left"></i> Kembali ke beranda</a>
                    </div>
                    <div class="col-lg-8 col-sm-12 my-1">
                      <a class="btn btn-icon btn-success icon-right w-100" href={{ route('question_card_step_2') }}>Oke, sudah benar. Gunakan data kisi - kisi ini</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection