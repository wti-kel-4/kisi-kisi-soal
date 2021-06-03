@extends('admin.master.main')
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tentukan Opsi Keperluan Pembuatan Kisi - Kisi Soal</h1>
          </div>
          <div class="section-body">
            @include('user.master.alert_error')
            <h2 class="section-title">Pilih salah satu jenis ujian</h2>
            <p class="section-lead">PTS, PAT, PKK</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <a class="col-12 col-md-6 col-lg-4" href="{{ route('admin.question_grid_step_0_store', $type = 'PTS') }}">
                          {{-- <div class="col-12 col-md-6 col-lg-4"> --}}
                            <div class="card card-info">
                              <div class="card-header">
                                <h4>PTS</h4>
                              </div>
                              <div class="card-body">
                                <p>Penilaian Tengah Semester</p>
                              </div>
                            </div>
                          {{-- </div> --}}
                        </a>
                        <a class="col-12 col-md-6 col-lg-4" href="{{ route('admin.question_grid_step_0_store', $type = 'PAT') }}">
                          {{-- <div class="col-12 col-md-6 col-lg-4"> --}}
                            <div class="card card-success">
                              <div class="card-header">
                                <h4>PAT</h4>
                              </div>
                              <div class="card-body">
                                <p>Penilaian Akhir Tahun</p>
                              </div>
                            </div>
                          {{-- </div> --}}
                        </a>
                        <a class="col-12 col-md-6 col-lg-4" href="{{ route('admin.question_grid_step_0_store', $type = 'PKK') }}">
                          {{-- <div class="col-12 col-md-6 col-lg-4"> --}}
                            <div class="card card-dark">
                              <div class="card-header">
                                <h4>PKK</h4>
                              </div>
                              <div class="card-body">
                                <p>Penilaian Kenaikan Kelas</p>
                              </div>
                            </div>
                          {{-- </div> --}}
                        </a>
                      </div>
                    </div>
                    <div class="row card-footer">
                      <div class="col text-left">
                        <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon icon-right btn-danger"><i class="fas fa-arrow-left"></i> Kembali Ke Beranda</a>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection