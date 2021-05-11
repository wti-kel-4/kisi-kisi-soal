@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Kompetensi Dasar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kompetensi Dasar</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('basic-competency.store') }}" method="post">
                            @csrf
                            @method('GET')
                        <div class="card-header">
                            <h4>Default Validation</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                            <label>Nama Kompetensi Dasar</label>
                            <textarea disabled name="name" class="form-control" required="">{{$basic_competencies->name}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select disabled name="studies_id" id="name" class="form-control">
                                    <option selected value="{{$basic_competencies->study->id}}">{{$basic_competencies->study->name}}</option>
                                </select>
                            </div>
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