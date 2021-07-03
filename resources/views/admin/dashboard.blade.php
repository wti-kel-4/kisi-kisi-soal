@extends('admin.master.main')
@section('title')
    Dashboard
@endsection
@section('body')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Thn. {{ session('tahun_ajaran') }}</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Pengguna</h4>
                    </div>
                    <div class="card-body">
                    {{ $count_user }}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-building"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Kelas</h4>
                    </div>
                    <div class="card-body">
                    {{ $count_grade }}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                    {{ $count_study }}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Guru</h4>
                    </div>
                    <div class="card-body">
                    {{ $count_teacher }}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-address-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Kompetensi Dasar</h4>
                    </div>
                    <div class="card-body">
                    {{ $count_basic_competency }}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Kisi - Kisi Soal</h4>
                    </div>
                    <div class="card-body">
                    {{ $count_question_grid }}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h4>Total Kartu Soal</h4>
                    </div>
                    <div class="card-body">
                    {{ $count_question_card }}
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