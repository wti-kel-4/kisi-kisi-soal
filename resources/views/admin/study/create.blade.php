@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Mata Pelajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#"></a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('study.store') }}" method="post">
                            @csrf
                        <div class="card-header">
                            <h4>Default Validation</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                            <label>Nama Mata Pelajaran</label>
                            <input name="name" type="text" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Guru</label>
                                <select name="teachers_id" id="name" class="form-control">
                                    @foreach ($teacher as $teacher)
                                    <option selected value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="grades_id" id="name" class="form-control">
                                    @foreach ($grade as $grade)
                                    <option selected value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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