@extends('general.master.main')
@section('content')
<div id="app">
  <section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
      <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
        <div class="p-4 m-3">
          <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
          <h4 class="text-dark font-weight-normal">Selamat Datang <span class="font-weight-bold">Di SMA Antartika Sidoarjo</span></h4>
          <p class="text-muted">Sistem Manajemen Kisi - Kisi dan Kartu Soal</p>
          <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="form-group">
              <label for="email">Username</label>
              <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
              <div class="invalid-feedback">
                Masukkan Username Anda
              </div>
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Password</label>
              </div>
              <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
              <div class="invalid-feedback">
                please fill in your password
              </div>
            </div>

            <div class="form-group text-right">
              <a href="auth-forgot-password.html" class="float-left mt-3">
                Forgot Password?
              </a>
              <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                Login
              </button>
            </div>
          </form>

          <div class="text-center mt-5 text-small">
            Copyright &copy;{{ date('Y') }} || SMA Antartika Sidoarjo. <br>Made with 💙 by Stisla
            <div class="mt-2">
              <a href="#">Kebijakan Privasi</a>
              <div class="bullet"></div>
              <a href="#">Kebijakan Pelayanan</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('assets/img/bg.jpg')  }}">
        <div class="absolute-bottom-left index-2">
          <div class="text-light p-5 pb-2">
            <div class="mb-5 pb-3">
              <h1 class="mb-2 display-4 font-weight-bold">Sistem Manajemen Kisi - Kisi dan Kartu Soal</h1>
              <h5 class="font-weight-normal text-muted-transparent">SMA Antartika Sidoarjo</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection