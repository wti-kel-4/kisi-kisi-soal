@extends('user.master.main')
@section('title')
    Materi Saya
@endsection
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1> Materi Saya</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('user.my-scope-lesson.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>
        <div class="section-body">
            @include('user.master.alert_success')
            @include('user.master.alert_error')
            @include('user.master.alert_info')
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data  Materi</h4>
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
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                        @forelse ($lessons as $index=>$lesson)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $lesson->name }}</td>
                            <td>
                                <form action={{ route('user.my-lesson.destroy', $lesson) }} method="POST">
                                    <a href="{{ route('user.my-lesson.edit', $lesson->id)}}" class="btn btn-info">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <p class="text-primary text-center">Belum ada data, tambahkan data baru</p>
                            </td>
                        </tr>
                    @endforelse
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
