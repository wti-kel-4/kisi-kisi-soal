@extends('admin.master.main')
@section('title')
  Mata Pelajaran
@endsection
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Detail Mata Pelajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.study.index') }}">Mata Pelajaran</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form>
                        <div class="card-header">
                            <h4>Detail data mata pelajaran baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Mata Pelajaran</label>
                                        <input name="name" type="text" class="form-control" required="" value="{{ $study->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                        <select name="grade_generalizations_id" id="name" class="form-control select2" disabled>
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