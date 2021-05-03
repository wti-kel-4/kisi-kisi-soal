

@extends('user.master.main')
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Profile</h1>
        </div>
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
                        {{-- <img alt="Foto User" src="{{ asset('assets/img/'.Auth::guard('user')->user()->url_photo) }}" class="rounded-circle profile-widget-picture"> --}}
                    </div>
                    <div class="profile-widget-description">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                
                                    <div class="profile-widget-name">
                                        {{ Auth::guard('user')->user()->teacher->name }}
                                        <div class="text-muted d-inline font-weight-normal">
                                            {{-- <div class="slash"></div>
                                                Guru  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>NIP</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                
                                    <div class="profile-widget-name">
                                        {{ Auth::guard('user')->user()->teacher->nip }}
                                        <div class="text-muted d-inline font-weight-normal">
                                            {{-- <div class="slash"></div>
                                                Guru  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                
                                    <div class="profile-widget-name">
                                        {{ Auth::guard('user')->user()->username }}
                                        <div class="text-muted d-inline font-weight-normal">
                                            {{-- <div class="slash"></div>
                                                Guru  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    {{-- <input type="text" class="form-control"> --}}
                                
                                    <div class="profile-widget-name">
                                        {{-- <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password"> --}}
                                        {{-- {{ Auth::guard('user')->user()->password}} --}}
                                        {{-- </label> --}}
                                        <div class="text-muted d-inline font-weight-normal">
                                            {{-- <div class="slash"></div>
                                                Guru  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-center"> --}}
                    <div class="card-footer">
                        <a href="{{ route('profile.edit', Auth::guard('user')->user()->id) }}" class="btn btn-primary">Edit Profile</a>
                        {{-- <div class="font-weight-bold mb-2">Follow Ujang On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div> --}}
                </div>
                </div>
                
            </div>
        </div>
      </section>

</div>
@endsection