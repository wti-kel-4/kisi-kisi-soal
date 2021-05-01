@extends('user.master.main')
@section('body')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Dashboard User</h1>
        </div>
        @include('user.master.alert_success')
        @include('user.master.alert_error')
        @include('user.master.alert_info')
        

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Nama Mata Pelajaran</h2>
                    <p class="section-lead">
                      description (optional)
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Nomor</h4>
                      <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                      </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse">
                      <div class="card-body">
                        Rumusan Soal
                      </div>
                      <div class="card-footer">
                        Kunci
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12  col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Nomor</h4>
                      <div class="card-header-action">
                        <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                      </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse2">
                      <div class="card-body">
                        Rumusan Soal
                      </div>
                      <div class="card-footer">
                        Kunci
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12  col-lg-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Nomor</h4>
                      <div class="card-header-action">
                        <a data-collapse="#mycard-collapse1" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                      </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse1">
                      <div class="card-body">
                        Rumusan Soal
                      </div>
                      <div class="card-footer">
                        Kunci
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
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index-0.js') }}"></script>
@endsection