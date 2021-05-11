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
                        <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Kelas</label>
                                        <input name="name" type="text" class="form-control" required="" value="{{ $grade->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Termasuk Kelas</label>
                                        <select name="grade_generalizations_id" class="form-control" disabled> 
                                            @foreach ($grade_generalizations as $grade_generalization)
                                                <option 
                                                @if ($grade_generalization->id == $grade->grade_generalizations_id)
                                                    selected
                                                @endif
                                                value="{{ $grade_generalization->id }}">{{ $grade_generalization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Wali Kelas</label>
                                <select name="teachers_id" class="form-control select2" disabled>
                                    @foreach ($teachers as $teacher)
                                        <option 
                                        @if ($teacher->id == $grade->teachers_id)
                                            selected
                                        @endif
                                        value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{--  --}}
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