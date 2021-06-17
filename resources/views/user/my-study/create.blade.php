@extends('user.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Mata Pelajaran Saya Baru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('user.my-study.index') }}">Mata Pelajaran Saya</a></div>
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
                            <h4>Tambahkan Mata Pelajaran Ke Mata Pelajaran Saya</h4>
                        </div>
                        <form action="{{ route('user.my-study.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Mata Pelajaran</label>
                                    @if (count($studies))
                                        <select name="studies_id" class="form-control select2" required>
                                            @foreach ($studies as $study)
                                                <option value="{{ $study->id }}">{{ $study->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="card-footer text-right">
                                @if (count($studies))
                                    <button class="btn btn-primary">Submit</button>
                                @else
                                <button class="btn btn-secondary" disabled>Submit</button>
                                @endif
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