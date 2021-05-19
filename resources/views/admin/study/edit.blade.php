@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Mata Pelajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.study.index') }}">Mata Pelajaran</a></div>
            </div>
            </div>
            @include('admin.master.alert_error')
            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.study.update',$study->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-header">
                            <h4>Default Validation</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $study->id }}">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Mata Pelajaran</label>
                                        <input name="name" type="text" class="form-control" value="{{ $study->name}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                        <select name="grade_generalizations_id" id="name" class="form-control select2">
                                            <option value="{{ $study->grade_generalizations_id }}">{{ $study->grade_generalization->name }}</option>
                                            @foreach ($grade_generalizations as $grade_generalization)
                                            <option 
                                            @if ($grade_generalization->id == $study->grade_generalizations_id)
                                                selected    
                                            @endif
                                            value="{{$grade_generalization->id}}">{{$grade_generalization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
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