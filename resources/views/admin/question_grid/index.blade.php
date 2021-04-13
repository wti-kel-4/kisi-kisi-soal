@extends('admin.master.main')
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Kisi - Kisi Soal</h1>
        <div class="section-header-breadcrumb">
            <a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Kisi - Kisi Soal</h4>
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
                            <th>Digunakan Untuk</th>
                            <th>Untuk Ujian</th>
                            <th>Mata Pelajaran</th>
                            <th>Total Soal</th>
                            <th>Kompetensi Dasar</th>
                            <th>Indikator</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $no = 1;  
                        @endphp
                        @foreach ($question_grids as $question_grid)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $question_grid->teacher->name }}</td>
                            <td>{{ $question_grid->type }}</td>
                            <td>{{ $question_grid->study->name }}</td>
                            <td>{{ $question_grid->total }}</td>
                            <td>{{ $question_grid->basic_competency->name }}</td>
                            <td>{{ $question_grid->indicator }}</td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
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