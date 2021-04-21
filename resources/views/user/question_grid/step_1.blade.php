@extends('user.master.main')
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Pertama</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Lengkapi Identitas Kisi - Kisi Soal</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label>Satuan Pendidikan</label>
                          <input type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                          <label>Mata Pelajaran (Pilihan dari daftar mata pelajaran yang Anda ajar)</label>
                          <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Kelas (Pilihan dari daftar kelas yang Anda ajar)</label>
                          <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label>Alokasi Waktu</label>
                          <input type="number" class="form-control" placeholder="Masukkan alokasi waktu pengerjaan">
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Jumlah Soal</label>
                              <input type="number" class="form-control" placeholder="Masukkan jumlah soal">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Jenis/Tipe Soal</label>
                              <select class="form-control">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tahun ajaran</label>
                          <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="col text-right">
                      <a href="{{ route('question_grid_step_2') }}" class="btn btn-icon icon-right btn-primary">Selanjutnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection