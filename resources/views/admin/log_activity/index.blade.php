@extends('admin.master.main')
@section('body')
<div class="main-content">
<section class="section">
    <div class="section-header">
        <h1>Aktivitas User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Log Activity</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Kisi</th>
                                    <th>Kartu Soal</th>
                                    <th>User</th>
                                    <th>Digunakan oleh</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @php
                                    $no = 1;  
                                @endphp
                                @foreach ($log_activities as $log )
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $log->question_grid->type }}</td>
                                    <td>{{ $log->question_card->question}}</td>
                                    <td>{{ $log->user->username }}</td>
                                    <td>{{ $log->used_for_users_id }}</td>
                                    <td>{{ $log->created_at }}</td>
                                    <td><div class="badge badge-success">{{ $log->action }}</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                             <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                             </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
</div>
@endsection