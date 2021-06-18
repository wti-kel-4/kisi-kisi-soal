@extends('admin.master.main')
@section('title')
  User
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Data User</h1>
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
                        <div class="card-header">
                            <h4>Ubah data user dan juga bisa ganti password</h4>
                        </div>
                        <div class="card-body">
                            {{-- <form action="{{ url('admin/user/update/'.$user->id) }}" method="POST" enctype="multipart/form-data"> --}}
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row d-flex h-100 justify-content-center align-items-center">
                                        <div class="col-6 mx-auto mb-5">
                                            @if ($user->url_photo == null)
                                                <figure class="avatar avatar-xl mx-auto mb-2" data-initial="{{ substr($user->username, 0, 2) }}" title="{{ $user->teacher->name }}"></figure>    
                                            @else
                                            <figure class="avatar avatar-xl mx-auto mb-2">
                                                <img alt="image" src="{{ asset($user->url_photo) }}" title="{{ $user->teacher->name }}">
                                            </figure>
                                            @endif
                                            <p>Ubah Foto Disini...</p>
                                            <input type="file" name="file" id="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="form-group">
                                                <label for="">Guru</label>
                                                <select name="teachers_id" class="form-control select2">
                                                    @foreach ($teachers as $teacher)
                                                        <option 
                                                            @if ($teacher->id == $user->teachers_id)
                                                            selected
                                                        @endif
                                                        value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label>Username</label>
                                                    <input name="username" type="text" class="form-control" value={{ $user->username }}>
                                                </div>
                                                <div class="col">
                                                    <label>Password (Jika ingin ubah password tulis disini)</label>
                                                    <input name="password" type="password" placeholder="Optional" class="form-control">
                                                </div>
                                            </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                                        </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')

@endsection