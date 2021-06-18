@extends('admin.master.main')
@section('title')
  Guru
@endsection
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Guru</h1>
        <div class="section-header-breadcrumb">
            <a href="{{route('admin.teacher.create')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>
        @include('admin.master.alert_success')
        @include('admin.master.alert_info')
        @include('admin.master.alert_error')
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Guru (Diurutkan berdasarkan NIP)</h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    {{ $teachers->links() }}
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $no = ($teachers->currentpage() -1 ) * $teachers->perpage() + 1;
                        @endphp
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>
                                <form action="{{ route('admin.teacher.destroy', ['teacher' => $teacher->id])}}" method="POST">
                                    <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.teacher.show', $teacher->id) }}" class="btn btn-secondary">Detail</a>
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