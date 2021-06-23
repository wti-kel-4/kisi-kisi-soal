@extends('admin.master.main')
@section('title')
    Lingkup Materi 
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Data Lingkup Materi </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.scope-lesson.index') }}">Lingkup Materi </a></div>
            </div>
            </div>
            <div class="section-body">
            @include('admin.master.alert_success')
            @include('admin.master.alert_error')
            @include('admin.master.alert_info')
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Lingkup Materi</h4>
                        </div>
                        <form action="{{ route('admin.scope-lesson.update', $scope_lesson->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lingkup Materi</label>
                                    <input value="{{$scope_lesson->name}}" type="text" class="form-control" name="edit_scope_lesson_name" required>
                                    
                                </div>
                            </div>
                            
                            <div class="card-footer text-right">
                                
                                <button class="btn btn-success">Submit</button>
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