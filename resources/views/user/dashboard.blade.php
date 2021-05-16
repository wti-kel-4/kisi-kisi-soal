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
                <div class="card-icon bg-success">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Kisi Kisi Soal Anda</h4>
                    </div>
                    <div class="card-body">
                    {{ count($question_grid_header) }}
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Penilaian Kenaikan Kelas</h2>
                    <p class="section-lead">
                        PKK
                    </p>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dark">
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
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Penilaian Akhir Tahun</h2>
                    <p class="section-lead">
                        PAT
                    </p>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-success">
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
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Penilaian Tengah Semester</h2>
                    <p class="section-lead">
                        PTS
                    </p>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-info">
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
            </div>
        </div>        
    </section>
</div>
@endsection
@section('script')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index-0.js') }}"></script>
@endsection