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
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total question card</h4>
                    </div>
                    <div class="card-body">
                    10
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Nama Kelas (grade spelization)</h2>
                    <p class="section-lead">
                      description (optional)
                    </p>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="#">
                                <h4>(opsi1) Nama Mata Pelajaran</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            <p>Body Card </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>(Opsi 2)Nama Mata Pelajaran</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary">
                                  Lihat
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Body Card </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="#">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>(Opsi 3)Nama Mata Pelajaran</h4>
                            </div>
                            <div class="card-body">
                                <p>Body Card </p>
                            </div>
                        </div>
                    </a>
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