@extends('admin.master.main')
@section('title')
  User
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data User (Daftar)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">User</a></div>
            </div>
        </div>
        @include('admin.master.alert_error')
        @include('admin.master.alert_info')
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.user.store') }}" method="POST">
                            @csrf
                        <div class="card-header">
                            <h4>Daftarkan Guru menjadi User yang bisa login aplikasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Guru</label>
                                <select name="teachers_id" class="form-control select2">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label>Username</label>
                                    <input name="username" type="text" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Daftarkan</button>
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