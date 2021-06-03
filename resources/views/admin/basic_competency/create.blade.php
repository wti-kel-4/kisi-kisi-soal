@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Kompetensi Dasar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.basic-competency.index') }}">Kompetensi Dasar</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.basic-competency.store') }}" method="post">
                            @csrf
                        <div class="card-header">
                            <h4>Tambah Kompetensi Dasar</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <label>Nama Kompetensi Dasar</label>
                                <textarea name="name" class="form-control" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select name="studies_id" id="studies_id" class="form-control">
                                    @foreach ($study as $study)
                                        <option selected value="{{$study->id}}">{{$study->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="grade_generalizations_id" id="grade_generalizations_id" class="form-control">
                                    @foreach ($grade_generalizations as $grade_generalization)
                                        <option selected value="{{$grade_generalization->id}}">{{$grade_generalization->name}}</option>
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