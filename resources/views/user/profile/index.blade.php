

@extends('user.master.main')
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Profile</h1>
        </div>

        @include('user.master.alert_error')
        @include('user.master.alert_success')

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">{{ Auth::guard('user')->user()->teacher->name }}</h2>
                    <p class="section-lead">
                        Selamat Datang
                    </p>
                </div>
            </div>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="Foto User" src="{{ asset('storage/images/'.Auth::guard('user')->user()->url_photo) }}" class="rounded-circle profile-widget-picture" style="max-height: 150px">
                        </div>
                        <div class="profile-widget-description">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                    
                                        <div class="profile-widget-name">
                                            {{ Auth::guard('user')->user()->teacher->name }}
                                            <div class="text-muted d-inline font-weight-normal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>NIP</label>
                                    
                                        <div class="profile-widget-name">
                                            {{ Auth::guard('user')->user()->teacher->nip }}
                                            <div class="text-muted d-inline font-weight-normal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                    
                                        <div class="profile-widget-name">
                                            {{ Auth::guard('user')->user()->username }}
                                            <div class="text-muted d-inline font-weight-normal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="profile-widget-name">
                                            <div class="text-muted d-inline font-weight-normal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('profile.edit', Auth::guard('user')->user()->id) }}" class="btn btn-primary">Edit Profile</a>
                            
                        </div>
                    </div>
                
                </div>
            </div>
      </section>

</div>
@endsection