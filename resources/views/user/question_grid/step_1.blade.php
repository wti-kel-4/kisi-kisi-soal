@extends('user.master.main')
@php
  use Illuminate\Support\Facades\Auth;
  $user = Auth::guard('user')->user();
  $mata_pelajaran = '';
  $kelas = '';
  $alokasi_waktu = '';
  $jumlah_soal = '';
  $jenis_soal = '';
  $tahun_ajaran = '';
  $question_grid_step_1 = session('teachers_id_'.$user->id.'_question_grid_step_1');
  if($question_grid_step_1){
    $mata_pelajaran = $question_grid_step_1->mata_pelajaran;
    $kelas = $question_grid_step_1->kelas;
    $alokasi_waktu = $question_grid_step_1->alokasi_waktu;
    $jumlah_soal = $question_grid_step_1->jumlah_soal;
    $jenis_soal = $question_grid_step_1->jenis_soal;
    $tahun_ajaran = $question_grid_step_1->tahun_ajaran;
  }
@endphp
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Pertama</h1>
          </div>
          <div class="section-body">
            @include('user.master.alert_error')
            <h2 class="section-title">Lengkapi Identitas Kisi - Kisi Soal</h2>
            <p class="section-lead">Lengkapi bagian header kisi - kisi soal</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <form id="question_grid_step_1" action="{{ route('question_grid_step_1.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                            <label>Satuan Pendidikan</label>
                            <input name="satuan_pendidikan" type="text" class="form-control" value="{{ $profile->name }}" disabled>
                          </div>
                          <div class="form-group">
                            <label>Mata Pelajaran (Pilihan dari daftar mata pelajaran yang Anda ajar)</label>
                            <select name="mata_pelajaran" class="form-control" required>
                              @if (count($studies) == 0)
                                <option selected disabled>Anda tidak memiliki daftar mata pelajaran ajar</option>
                              @endif
                              @foreach ($studies as $study)
                                @if ($mata_pelajaran == $study->name)
                                  <option value="{{ $study->id }}" selected>{{ $study->name }} ({{ $study->grade->name }})</option>
                                @else
                                  <option value="{{ $study->id }}">{{ $study->name }} ({{ $study->grade->name }})</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Kelas (Pilihan dari daftar kelas yang Anda ajar)</label>
                            <select name="kelas" class="form-control" required>
                              @if (count($teacher_grades) == 0)
                                <option selected disabled>Anda tidak memiliki daftar kelas ajar</option>
                              @endif
                              @foreach ($teacher_grades as $teacher_grade)
                                @if ($kelas == $teacher_grade->name)
                                <option value="{{ $teacher_grade->id }}" selected>{{ $teacher_grade->name }}</option>
                                @else
                                  <option value="{{ $teacher_grade->id }}">{{ $teacher_grade->name }}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                            <label>Alokasi Waktu</label>
                            <input name="alokasi_waktu" type="number" class="form-control" value="{{ $alokasi_waktu }}" placeholder="Masukkan alokasi waktu pengerjaan (dalam menit)" required>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Jumlah Soal</label>
                                <input name="jumlah_soal" type="number" class="form-control" value="{{ $jumlah_soal }}" placeholder="Masukkan jumlah soal" required>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Jenis/Tipe Soal</label>
                                <select name="jenis_soal" class="form-control" required>
                                  <option value="pg" {{ ($jenis_soal == 'pg') ? 'selected' : '' }}>Pilihan Ganda (PG)</option>
                                  <option value="isian" {{ ($jenis_soal == 'isian') ? 'selected' : '' }}>Isian</option>
                                  <option value="jumble" {{ ($jenis_soal == 'jumble') ? 'selected' : '' }}>Menjodohkan</option>
                                  <option value="uraian" {{ ($jenis_soal == 'uraian') ? 'selected' : '' }}>Uraian</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Tahun ajaran</label>
                            <select name="tahun_ajaran" class="form-control" required>
                              <option value="{{ date("Y",strtotime("-1 year")) }}" {{ ($tahun_ajaran == date("Y",strtotime("-1 year"))) ? 'selected' : '' }}>{{ date("Y",strtotime("-1 year")) }} / {{ date("Y") }}</option>
                              <option value="{{ date("Y",strtotime("-2 year")) }}" {{ ($tahun_ajaran == date("Y",strtotime("-2 year"))) ? 'selected' : '' }}>{{ date("Y",strtotime("-2 year")) }} / {{ date("Y",strtotime("-1 year")) }}</option>
                              <option value="{{ date("Y",strtotime("-3 year")) }}" {{ ($tahun_ajaran == date("Y",strtotime("-3 year"))) ? 'selected' : '' }}>{{ date("Y",strtotime("-3 year")) }} / {{ date("Y",strtotime("-2 year")) }}</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row card-footer">
                      <div class="col text-left">
                        <a href="{{ route('user.dashboard') }}" class="btn btn-icon icon-right btn-danger"><i class="fas fa-arrow-left"></i> Kembali Ke Beranda</a>
                      </div>
                      <div class="col text-right">
                        <button class="btn btn-icon icon-right btn-primary">Simpan & Selanjutnya <i class="fas fa-arrow-right"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection