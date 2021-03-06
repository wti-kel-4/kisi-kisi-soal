@extends('user.master.main')
@section('title')
    Profile
@endsection
@section('body')
<div class="main-content">


    <section class="section">
        <div class="section-header">
          <h1>User</h1>
        </div>
        @include('user.master.alert_error')
        @include('user.master.alert_success')
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="post" action="{{ route('user.profile.update', $users->id) }}" enctype="multipart/form-data" >
                            {{ method_field('PUT') }}
                            {{ csrf_field()}} 
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">                               
                                    <div class="form-group col-md-4 col-12">
                                        <label>Foto profile</label>
                                        <br>
                                        @if (file_exists(public_path(Auth::guard('user')->user()->url_photo)))
                                            <img alt="Foto User" src="{{ asset($users->url_photo) }}" class="rounded-circle profile-widget-picture" style="max-height: 100px ; min-height:100px; min-width:100px">
                                        @else
                                            <img alt="Foto User" src="{{ asset('assets/img/user.png') }}" class="rounded-circle profile-widget-picture" style="max-height: 100px ; min-height:100px; min-width:100px">
                                        @endif   
                                    </div>
                                    <div class="form-group col-md-8 col-12">
                                        <label>File</label>
                                        <input name="url_photo" type="file" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row">                               
                                    <div class="form-group col-md-12 col-12">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control" value="{{ $users->username}}">
                                        <div class="invalid-feedback">
                                            Username harus diisi
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" value="">
                                    <div class="invalid-feedback">
                                        Password harus diisi
                                    </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                    <label>Konfirmasi Password</label>
                                    <input name="password_confirmation" type="password" class="form-control" value="">
                                    <div class="invalid-feedback">
                                        Konfirmasi Password harus diisi
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan Profile</button>
                                </div>
                                <div class="text-left">
                                    <a href="{{ route('user.profile.index') }}" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>

</div>
@endsection