@extends('admin.master.main')
@section('body')
<div class="main-content" style="min-height: 564px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Guru</a></div>
            </div>
            </div>

            <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form>
                        <div class="card-header">
                            <h4>Default Validation</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control" required="">
                            </div>
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required="">
                            </div>
                            <div class="form-group">
                            <label>Subject</label>
                            <input type="email" class="form-control">
                            </div>
                            <div class="form-group mb-0">
                            <label>Message</label>
                            <textarea class="form-control" required=""></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
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