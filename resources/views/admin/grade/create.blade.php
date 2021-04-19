@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambahkan Data Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('grade.index') }}">Kelas</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form>
                        <div class="card-header">
                            <h4>Masukkan data kelas</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label>Nama Kelas</label>
                            <input name="grade_name" type="text" class="form-control" required="">
                            </div>
                            <div class="form-group">
                            <label>Guru</label>
                            <select name="teacher" class="form-control select2">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas Spesialisasi</label>
                                <select name="grade_specialization" class="form-control">
                                    @foreach ($grade_specializations as $grade_specializations)
                                        <option value="{{ $grade_specializations->id }}">{{ $grade_specializations->name }}</option>
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