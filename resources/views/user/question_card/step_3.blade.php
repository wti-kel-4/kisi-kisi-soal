@extends('user.master.main')
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Ketiga</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Verifikasi Data Kisi - Kisi Soal</h2>
            <p class="section-lead">Lihat Ulang Data, Apakah sudah valid? (Tampilan tabel bukan tampilan asli setelah jadi, Silahkan download preview untuk lihat bentuk kartu soal aslinya)</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="container">
                      <div class="row w-100">
                        <div class="col-12 col-sm-12 text-center">
                          <h5>Kartu Soal
                            @if ($question_card_header->type == 'PAT')
                                Penilaian Akhir Tahun
                            @endif
                            @if ($question_card_header->type == 'PKK')
                                Penilaian Kenaikan Kelas
                            @endif
                            @if ($question_card_header->type == 'PTS')
                                Penilaian Tengah Semester
                            @endif
                             {{ $question_card_header->semesters }}</h5>
                        </div>
                        <div class="col-12 col-sm-12 text-center">
                          <h5>{{ $question_card_header->profile->name }}</h5>
                        </div>
                      </div>
                      <div class="row w-100 mt-3">
                        <div class="col-md-6 col-sm-12">
                          <div class="container">
                            <div class="row">
                              <div class="col">
                                Penyusun
                              </div>
                              <div class="col">
                                : {{ $question_card_header->teacher->name }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Kelas
                              </div>
                              <div class="col">
                                : {{ $question_card_header->grade_generalization->name }}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="container">
                            <div class="row">
                              <div class="col">
                                Mata Pelajaran
                              </div>
                              <div class="col">
                                : {{ $question_card_header->study->name }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Tahun Pelajaran
                              </div>
                              <div class="col">
                                : {{ $question_card_header->school_year }} - {{ intval($question_card_header->school_year) + 1 }}
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
                            <th scope="col">No Soal</th>
                            <th scope="col">Indikator Pencapaian Kompetensi</th>
                            <th scope="col">Tingkat Kesulitan</th>
                            <th scope="col">Rumusan Soal</th>
                            <th scope="col">Opsi Benar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($question_cards) != null || count($question_cards) != 0)
                            @foreach($question_cards as $question_card)
                              @if (!empty($question_card))
                              <tr>
                                <td scope="row">{{ $question_card->question_number }}</td>
                                <td>{{ $question_card->indicator}}</td>
                                <td>
                                  @if ($question_card->rate == 'easy')
                                      <p class='text-success'>Mudah</p>
                                  @endif
                                  @if ($question_card->rate == 'medium')
                                      <p class='text-warning'>Sedang</p>
                                  @endif
                                  @if ($question_card->rate == 'hard')
                                      <p class='text-danger'>Sulit</p>
                                  @endif
                                </td>
                                <td>{!! $question_card->question !!}</td>
                                <td>{{ $question_card->answer_key }}</td>
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
                      <a href="{{ route('user.question_card_step_2') }}" class="btn btn-icon icon-right btn-primary w-100"><i class="fas fa-arrow-left"></i> Kembali ke halaman sebelumnya</a>
                    </div>
                    <div class="col-lg-6 col-sm-12 my-1">
                      <a class="btn btn-icon icon-right {{ ($question_cards != null) ? 'btn-success' : 'btn-secondary' }} w-100" {{ ($question_cards != null) ? "href=".url('user/question-card/step-finish/'.$question_card_header->id)  : "href=# disabled"}}>Oke, sudah benar. Simpan Data Keseluruhan</a>
                    </div>
                    <div class="col-lg-2 col-sm-12 my-1">
                      <a class="btn btn-icon icon-right {{ ($question_cards != null) ? 'btn-warning' : 'btn-secondary' }} w-100" {{ ($question_cards != null) ? "href=".url('user/question-card/preview/'.$question_card_header->id) : "href=# disabled"}}><i class="fa fa-file-word"></i> Preview</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection