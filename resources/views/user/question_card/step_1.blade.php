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
            <p class="section-lead">Lihat Ulang Data, Apakah sudah valid?</p>
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
                          <h4>
                            @if ($question_grid_header->type == 'PAT')
                                Penilaian Akhir Tahun
                            @endif
                            @if ($question_grid_header->type == 'PKK')
                                Penilaian Kenaikan Kelas
                            @endif
                            @if ($question_grid_header->type == 'PTS')
                                Penilaian Tengah Semester
                            @endif
                             {{ $question_grid_header->school_year }}</h4>
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
                                : {{ $question_grid_header->profile->name }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Mata Pelajaran
                              </div>
                              <div class="col">
                                : {{ $question_grid_header->study->name }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Kelas
                              </div>
                              <div class="col">
                                : {{ $question_grid_header->grade_generalization->name }}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="container">
                            <div class="row">
                              <div class="col">
                                Tahun Pelajaran
                              </div>
                              <div class="col">
                                : {{ $question_grid_header->school_year }} - {{ intval($question_grid_header->school_year) + 1 }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Semester
                              </div>
                              <div class="col">
                                : {{ $question_grid_header->semesters }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Kurikulum
                              </div>
                              <div class="col">
                                : {{ $question_grid_header->curriculum }}
                              </div>
                            </div>
                          </div>
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
                          @if ($question_grid_header->question_grid != null || count($question_grid_header->question_grid) != 0)
                            @foreach($question_grid_header->question_grid as $question_grid)
                              @if (!empty($question_grid))
                              <tr>
                                <th scope="row">{{ $question_grid->question_number }}</th>
                                <td>{{ $question_grid->basic_competency->name }}</td>
                                <td>{{ $question_grid->study_lesson_scope_lesson->study->name }}</td>
                                <td>{{ $question_grid->indicator }}</td>
                                <td>
                                  @if ($question_grid->question_form == 'pg')
                                    Pilihan Ganda                                      
                                  @endif
                                  @if ($question_grid->question_form == 'isian')
                                    Isian
                                  @endif
                                  @if ($question_grid->question_form == 'jumble')
                                    Menjodohkan
                                  @endif
                                  @if ($question_grid->question_form == 'uraian')
                                    Uraian
                                  @endif
                                </td>
                                <td>{{ $question_grid->question_number }}</td>
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
                    <div class="col text-center">
                      <p>Mengetahui</p>
                      <b>Kepala {{ $question_grid_header->satuan_pendidikan }}</b>
                      <br><br><br>
                      <b>Drs. Sukarno, M.Pd</b>
                      <p>NIP. 196112129893000</p>
                    </div>
                    <div class="col text-center">
                      <p>Sidoarjo, {{ date('d-m-Y') }}</p>
                      <b>Guru Mata Pelajaran</b>
                      <br><br><br>
                      <b>{{ $question_grid_header->teacher->name }}</b>
                      <p>NIP. {{ $question_grid_header->teacher->nip }}</p>
                    </div>
                  </div>
                  <div class="card-footer row">
                    <div class="col-lg-4 col-sm-12 my-1">
                      <a href="{{ route('user.question_card_step_0') }}" class="btn btn-icon icon-right btn-primary w-100"><i class="fas fa-arrow-left"></i> Kembali ke halaman sebelumnya</a>
                    </div>
                    <div class="col-lg-6 col-sm-12 my-1">
                      <a class="btn btn-icon icon-right {{ ($question_grid_header->question_grid != null) ? 'btn-success' : 'btn-secondary' }} w-100" {{ ($question_grid_header->question_grid != null) ? "href=".route('user.question_card_step_2') : "href=# disabled"}}>Oke, sudah benar. Gunakan Data Ini</a>
                    </div>
                    <div class="col-lg-2 col-sm-12 my-1">
                      <a class="btn btn-icon icon-right {{ ($question_grid_header->question_grid != null) ? 'btn-warning' : 'btn-secondary' }} w-100" {{ ($question_grid_header->question_grid != null) ? "href=".url('user/question-grid/download/'.$question_grid_header->id) : "href=# disabled"}}><i class="fa fa-file-word"></i> Download</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection