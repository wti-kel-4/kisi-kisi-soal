@extends('admin.master.main')
@section('title')
  User
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data User (Masal Excel)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">User</a></div>
            </div>
        </div>
        @include('admin.master.alert_error')
        @include('admin.master.alert_info')
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card text-center">
                        <form action="{{ route('admin.user.import_excel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row my-4 mx-4">
                                <label class="col-form-label text-md-center col-12">Masukkan file excel yang formatnya seperti ini : <a href="{{ asset('template/import_users.xlsx') }}" target="_blank">Lihat Disini</a></label>
                                <div class="custom-file col-12">
                                    <input type="file" class="custom-file-input" name="file" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary w-100">Daftarkan Semua</button>
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