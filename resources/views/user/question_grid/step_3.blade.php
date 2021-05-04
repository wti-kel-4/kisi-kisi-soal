@extends('user.master.main')
@php
  use Illuminate\Support\Facades\Auth;
  use App\Models\Study;
  use App\Models\GradeSpecialization;
  $user = Auth::guard('user')->user();
  $question_grid_step_1 = session('teachers_id_'.$user->id.'_question_grid_step_1');
  $type = '-';
  if(session()->has('teachers_id_'.$user->id.'_question_grid_step_0')){
    $type = session('teachers_id_'.$user->id.'_question_grid_step_0');
  }
  $question_grid_step_2 = null;
  if(session()->has('teachers_id_'.$user->id.'_question_grid_step_2')){
    $question_grid_step_2 = session('teachers_id_'.$user->id.'_question_grid_step_2');
  }
  $study = Study::find($question_grid_step_1->mata_pelajaran);
  $mata_pelajaran = $study->name;
  $grade_specialization = GradeSpecialization::find($question_grid_step_1->kelas);
  $kelas = $grade_specialization->name;
@endphp
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Ketiga</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Verifikasi Data Kartu Soal</h2>
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
                          <h4>{{ $type }} {{ $question_grid_step_1->tahun_ajaran }} - {{ intval($question_grid_step_1->tahun_ajaran) + 1 }}</h4>
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
                                : {{ $question_grid_step_1->satuan_pendidikan }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Mata Pelajaran
                              </div>
                              <div class="col">
                                : {{ $mata_pelajaran }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Kelas / Semester
                              </div>
                              <div class="col">
                                : {{ $kelas }}
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
                                : {{ $question_grid_step_1->alokasi_waktu }} menit
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Jumlah Soal
                              </div>
                              <div class="col">
                                : {{ $question_grid_step_1->jumlah_soal }} 
                                @if ($question_grid_step_1->jenis_soal == 'pg')
                                    PG
                                @endif
                                @if ($question_grid_step_1->jenis_soal == 'isian')
                                    Isian
                                @endif
                                @if ($question_grid_step_1->jenis_soal == 'uraian')
                                    Uraian
                                @endif
                                @if ($question_grid_step_1->jenis_soal == 'jumble')
                                    Menjodohkan
                                @endif
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                Tahun Pelajaran
                              </div>
                              <div class="col">
                                : {{ $question_grid_step_1->tahun_ajaran }} - {{ intval($question_grid_step_1->tahun_ajaran) + 1 }}
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
                          @if ($question_grid_step_2 != null)
                            @for($i = 0; $i < count($question_grid_step_2); $i++)
                              @if (!empty($question_grid_step_2[$i]))
                              <tr>
                                <th scope="row">{{ $i+1 }}</th>
                                <td>
                                  {{ $question_grid_step_2[$i]->kompetensi_dasar_1 }}
                                  <br /><br /> {{ $question_grid_step_2[$i]->kompetensi_dasar_2 }}
                                  <br /><br /> {{ $question_grid_step_2[$i]->kompetensi_dasar_3 }}
                                  <br />
                                </td>
                                <td>{{ $question_grid_step_2[$i]->materi }}</td>
                                <td>{{ $question_grid_step_2[$i]->indikator }}</td>
                                <td>
                                  @if ($question_grid_step_2[$i]->bentuk == 'pg')
                                    Pilihan Ganda                                      
                                  @endif
                                  @if ($question_grid_step_2[$i]->bentuk == 'isian')
                                    Isian
                                  @endif
                                  @if ($question_grid_step_2[$i]->bentuk == 'jumble')
                                    Menjodohkan
                                  @endif
                                  @if ($question_grid_step_2[$i]->bentuk == 'uraian')
                                    Uraian
                                  @endif
                                </td>
                                <td>{{ $question_grid_step_2[$i]->dari_no }} s/d {{ $question_grid_step_2[$i]->sampai_no }}</td>
                              </tr>
                              @endif
                            @endfor
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
                      <a href="{{ route('question_grid_step_2') }}" class="btn btn-icon icon-right btn-primary w-100"><i class="fas fa-arrow-left"></i> Kembali ke halaman sebelumnya</a>
                    </div>
                    <div class="col-lg-8 col-sm-12 my-1">
                      <a class="btn btn-icon icon-right {{ ($question_grid_step_2 != null) ? 'btn-success' : 'btn-secondary' }} w-100" {{ ($question_grid_step_2 != null) ? "href=".route('question_grid_step_finish') : "href=# disabled"}}>Oke, sudah benar. Simpan Data Keseluruhan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection