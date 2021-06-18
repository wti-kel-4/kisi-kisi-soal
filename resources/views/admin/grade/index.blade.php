@extends('admin.master.main')
@section('title')
  Kelas
@endsection
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Kelas</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('admin.grade.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>
        @include('admin.master.alert_success')
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Kelas</h4>
                    <div class="card-header-form">
                        <form>
                        <div class="input-group">
                            <div class="input-group-btn">
                                {{ $grades->links() }}
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
                            <th>Nama</th>
                            <th>Guru Wali Kelas</th>
                            <th>Termasuk Kelas</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $no = ($grades->currentpage() -1 ) * $grades->perpage() + 1;
                        @endphp
                        @foreach ($grades as $grade)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $grade->name }}</td>
                            <td>{{ $grade->teacher->name }}</td>
                            <td>{{ $grade->grade_generalization->name }}</td>
                            <td>
                                <form action="{{ route('admin.grade.destroy', ['grade' => $grade->id])}}" method="POST">
                                    <a href="{{ route('admin.grade.edit', $grade->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.grade.show', $grade->id) }}" class="btn btn-secondary">Detail</a>
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
    </section>
</div>
@endsection