@extends('user.master.main')
@section('body')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Langkah Kedua</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Lengkapi Data Kisi - Kisi Soal (0/0)</h2>
            <p class="section-lead">Tuliskan No urut, KD, Materi, Indikator Soal, Bentuk Soal, No Soal secara urut</p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-1 col-md-1">
                        <div class="form-group">
                          <label>No Urut</label>
                          <input type="number" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8">
                        <div class="form-group">
                          <label>Kompetensi Dasar</label>
                          <textarea class="form-control" style="min-width:10px; min-height:100px;"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Materi</label>
                          <select class="form-control">
                            <option>Option 1</option>
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Indikator Soal</label>
                          <textarea class="form-control" style="min-width:10px; min-height:100px;"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label>Bentuk Soal</label>
                          <select class="form-control">
                            <option>Option 1</option>
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label>No Soal Dari</label>
                          <input type="number" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Sampai No Soal</label>
                          <input type="number" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row card-footer">
                      <div class="col text-left">
                        <a href="{{ route('question_grid_step_1') }}" class="btn btn-icon icon-right btn-primary"><i class="fas fa-arrow-left"></i>Kembali Ke Step Sebelumnya</a>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('question_grid_step_2') }}" class="btn btn-icon icon-right btn-primary">Selanjutnya <i class="fas fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="section-header">
            <h6>Kisi - Kisi Soal Yang Dibuat</h6>
          </div>
          <div class="section-body">
            <div class="card">
              <div class="card-body">
                hello
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                hello
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                hello
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection