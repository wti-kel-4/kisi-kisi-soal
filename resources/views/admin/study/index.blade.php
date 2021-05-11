@extends('admin.master.main')
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Mata Pelajaran</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('admin.study.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>
        @include('admin.master.alert_success')
        <div class="section-body">
            @if (Session::get('error'))
            <div class="alert alert-warning alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                  <div class="alert-title">Perhatian</div>
                  Mata Pelajaran sedang digunakan, data tidak berhasil dihapus
                </div>
              </div>
            @endif
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Mata Pelajaran</h4>
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
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $no = 1;  
                        @endphp
                        @foreach ($studies as $study)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $study->name }}</td>
                            <td>{{ $study->grade->name }}</td>
                            <td>
                            <form method="POST" action="{{ route('admin.study.destroy', $study->id) }}">
                                @csrf
                                <a href="{{ route('admin.study.edit', $study->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.study.show', $study->id) }}" class="btn btn-secondary">Detail</a>
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