@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kompetensi Dasar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kompetensi Dasar</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('basic-competency.update', $basic_competencies->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field()}}
                        <div class="card-header">
                            <h4>Default Validation</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                            <label>Nama Kompetensi Dasar</label>
                            <textarea name="name" class="form-control" required="">{{$basic_competencies->name}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select name="studies_id" id="name" class="form-control">
                                    <option selected value="{{$basic_competencies->study->id}}">{{$basic_competencies->study->name}}</option>
                                    @foreach ($study as $study)
                                    <option value="{{$study->id}}">{{$study->name}}</option>
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