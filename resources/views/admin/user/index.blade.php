@extends('admin.master.main')
@section('title')
  User
@endsection
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.user.create.import_excel')}}" class="btn btn-icon icon-left btn-success mx-2"><i class="fas fa-file-excel"></i> Tambah Data (Excel) </a>
                <a href="{{route('admin.user.create')}}" class="btn btn-icon icon-left btn-success mx-2"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        @include('admin.master.alert_success')
        @include('admin.master.alert_error')
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data User</h4>
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
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $no = 1;  
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>
                                @if ($user->url_photo == null)
                                    <img alt="image" src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $user->teacher->name }}">
                                @else
                                    <img alt="image" src="{{ asset($user->url_photo) }}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $user->teacher->name }}">
                                @endif
                                    
                            </td>
                            <td>{{ $user->teacher->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <form action="{{ route('admin.user.destroy', ['user' => $user->id])}}" method="POST">
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-secondary">Detail</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
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