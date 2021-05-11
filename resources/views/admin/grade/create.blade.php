@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambahkan Data Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.grade.index') }}">Kelas</a></div>
            </div>
            </div>
            @include('admin.master.alert_error')
            @include('admin.master.alert_info')
            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Masukkan data kelas</h4>
                        </div>
                        <form action="{{ route('admin.grade.store') }}" method="POST">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <input name="name" type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Termasuk Kelas</label>
                                        <select name="grade_generalizations_id" class="form-control">
                                            @foreach ($grade_generalizations as $grade_generalization)
                                                <option value="{{ $grade_generalization->id }}">{{ $grade_generalization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Wali Kelas</label>
                                <select name="teachers_id" class="form-control select2">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
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