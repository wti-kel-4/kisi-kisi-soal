@extends('admin.master.main')
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Kompetensi Dasar</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('basic-competency.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>
        
        @if (Session::get('success'))
        <div class="alert alert-success alert-has-icon alert-dismissible show fade">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
            <div class="alert-title">Berhasil</div>
            {{ Session::get('success') }}
            </div>
        </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Kompetensi Dasar</h4>
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
                            <th>Mata Pelajaran</th>
                            <th style="width: 300px">Aksi</th>
                        </tr>
                        @php
                            $no = 1;  
                        @endphp
                        @foreach ($basic_competencies as $basic_competency)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $basic_competency->name }}</td>
                            <td>{{ $basic_competency->study->name }}</td>
                            <td><form action="{{ route('basic-competency.destroy', $basic_competency->id)}}" method="POST">
                                <a href="{{ route('basic-competency.show', $basic_competency->id) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('basic-competency.edit', $basic_competency->id) }}" class="btn btn-primary">Edit</a>
                                
                                @csrf
                                @method('DELETE')
                                <button href="{{ route('basic-competency.destroy', $basic_competency->id) }}" type="submit" class="btn btn-danger">Hapus</button>
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