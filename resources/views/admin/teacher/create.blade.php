@extends('admin.master.main')
@section('title')
  Guru
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.teacher.index') }}">Guru</a></div>
            </div>
        </div>
        @include('admin.master.alert_error')
        @include('admin.master.alert_info')
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.teacher.store') }}" method="POST">
                            @csrf
                        <div class="card-header">
                            <h4>Masukkan NIP dan Nama guru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>NIP Guru (Nomor Induk Pegawai)</label>
                                        <input type="text" name="nip" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Guru</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')

@endsection