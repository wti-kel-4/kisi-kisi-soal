@extends('user.master.main')
@section('title')
    Mata Pelajaran Saya
@endsection
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Mata Pelajaran Saya</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('user.my-study.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>
        <div class="section-body">
            @include('user.master.alert_success')
            @include('user.master.alert_error')
            @include('user.master.alert_info')
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Mata Pelajaran</h4>
                    <div class="card-header-form">
                        <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                        @if (count($teacher_studies))
                            @php
                                $no = 1;  
                            @endphp
                            @foreach ($teacher_studies as $teacher_study)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $teacher_study->study->name }}</td>
                                <td>{{ $teacher_study->study->grade_generalization->name }}</td>
                                <td>
                                    <form action={{ route('user.my-study.destroy', ['my_study' => $teacher_study]) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <p class="text-primary text-center">Belum ada data, tambahkan data baru</p>
                                </td>
                            </tr>
                        @endif
                      </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection