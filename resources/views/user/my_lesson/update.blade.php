@extends('user.master.main')
@section('title')
    Materi 
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1> Edit Materi </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('user.my-lesson.index') }}">Materi </a></div>
            </div>
            </div>
            <div class="section-body">
            @include('user.master.alert_success')
            @include('user.master.alert_error')
            @include('user.master.alert_info')
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Materi </h4>
                        </div>
                        <form action="{{ route('user.my-lesson.update', $lesson->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Materi</label>
                                    <input type="text" class="form-control" name="edit_lesson_name" value="{{$lesson->name}}" required>
                                </div>
                            </div>
                            
                            <div class="card-footer text-right">
                                <button class="btn btn-success" >Submit</button>
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