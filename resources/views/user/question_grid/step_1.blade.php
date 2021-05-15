@extends('user.master.main')
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Pertama</h1>
          </div>
          <div class="section-body">
            @include('user.master.alert_error')
            <h2 class="section-title"></h2>
            <p class="section-lead">Lengkapi bagian header kisi - kisi soal</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <form id="question_grid_step_1" action="{{ route('user.question_grid_step_1.store') }}" method="POST">
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
                              @if (count($teacher_studies) == 0)
                                <option selected disabled>Anda tidak memiliki daftar mata pelajaran ajar</option>
                              @endif
                              @foreach ($teacher_studies as $teacher_study)
                                {{-- @if ($mata_pelajaran == $teacher_study->study->id)
                                  <option value="{{ $teacher_study->study->id }}" selected>{{ $teacher_study->study->name }} ({{ $teacher_study->study->grade->name }})</option>
                                @else --}}
                                  <option value="{{ $teacher_study->study->id }}">{{ $teacher_study->study->name }}</option>
                                {{-- @endif --}}
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Kelas (Pilihan dari daftar kelas yang Anda ajar)</label>
                            <select name="kelas" class="form-control" required>
                              @if (count($teacher_grade_generalizations) == 0)
                                <option selected disabled>Anda tidak memiliki daftar kelas ajar</option>
                              @endif
                              @foreach ($teacher_grade_generalizations as $teacher_grade_generalization)
                                {{-- @if ($kelas == $teacher_grade_generalizationgrade->grade->id)
                                <option value="{{ $teacher_grade_generalization->grade->id }}" selected>{{ $teacher_grade_generalization->grade->name }}</option>
                                @else --}}
                                  <option value="{{ $teacher_grade_generalization->grade_generalization->id }}">{{ $teacher_grade_generalization->grade_generalization->name }}</option>
                                {{-- @endif --}}
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                              {{-- <label>Tahun ajaran</label>
                              <select name="tahun_ajaran" class="form-control" required>
                                <option value="{{ date("Y",strtotime("-1 year")) }}" {{ ($tahun_ajaran == date("Y",strtotime("-1 year"))) ? 'selected' : '' }}>{{ date("Y",strtotime("-1 year")) }} / {{ date("Y") }}</option>
                                <option value="{{ date("Y",strtotime("-2 year")) }}" {{ ($tahun_ajaran == date("Y",strtotime("-2 year"))) ? 'selected' : '' }}>{{ date("Y",strtotime("-2 year")) }} / {{ date("Y",strtotime("-1 year")) }}</option>
                                <option value="{{ date("Y",strtotime("-3 year")) }}" {{ ($tahun_ajaran == date("Y",strtotime("-3 year"))) ? 'selected' : '' }}>{{ date("Y",strtotime("-3 year")) }} / {{ date("Y",strtotime("-2 year")) }}</option>
                              </select> --}}
                              <label>Tahun ajaran</label>
                              <select name="tahun_ajaran" class="form-control" required>
                                <option value="{{ date("Y",strtotime("-1 year")) }}">{{ date("Y",strtotime("-1 year")) }} / {{ date("Y") }}</option>
                                <option value="{{ date("Y",strtotime("-2 year")) }}">{{ date("Y",strtotime("-2 year")) }} / {{ date("Y",strtotime("-1 year")) }}</option>
                                <option value="{{ date("Y",strtotime("-3 year")) }}">{{ date("Y",strtotime("-3 year")) }} / {{ date("Y",strtotime("-2 year")) }}</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" class="form-control" required>
                                  {{-- <option value="1" {{ ($jenis_soal == 'pg') ? 'selected' : '' }}>Pilihan Ganda (PG)</option>
                                  <option value="0" {{ ($jenis_soal == 'isian') ? 'selected' : '' }}>Isian</option> --}}
                                  <option value="1">Ganjil</option>
                                  <option value="0">Genap</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Kurikulum</label>
                              {{-- <input name="kurikulum" type="number" class="form-control" value="{{ $jumlah_soal }}" placeholder="Masukkan jumlah soal" required> --}}
                              <input name="kurikulum" type="number" class="form-control" placeholder="Masukkan jenis kurikulum" required>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row card-footer">
                      <div class="col text-left">
                        <a href="{{ route('user.dashboard.index') }}" class="btn btn-icon icon-right btn-danger"><i class="fas fa-arrow-left"></i> Kembali Ke Beranda</a>
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