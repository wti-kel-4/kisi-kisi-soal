@extends('admin.master.main')
@section('title')
  User
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Detail User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">User</a></div>
            </div>
        </div>
        @include('admin.master.alert_error')
        @include('admin.master.alert_info')
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form>
                        <div class="card-header">
                            <h4>Data Detail User dengan Username : ({{ $user->username }})</h4>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center mb-2">
                                <div class="d-flex col-lg-6 col-sm-12">
                                    @if ($user->url_photo == null)
                                        <figure class="avatar avatar-xl mx-auto" data-initial="{{ substr($user->username, 0, 2) }}" title="{{ $user->teacher->name }}"></figure>    
                                    @else
                                    <figure class="avatar mr-2 avatar-xl mx-auto">
                                        <img alt="image" src="{{ asset($user->url_photo) }}" title="{{ $user->teacher->name }}">
                                    </figure>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group text-center">
                                        <label for="">Guru</label>
                                        <select name="teachers_id" class="form-control select2" disabled>
                                            @foreach ($teachers as $teacher)
                                                <option 
                                                @if ($teacher->id == $user->teachers_id)
                                                    selected
                                                @endif
                                                value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control text-center" value="{{ $user->username }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{-- <button type="submit" class="btn btn-primary">Daftarkan</button> --}}
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