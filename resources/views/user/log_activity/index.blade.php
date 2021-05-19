@extends('user.master.main')
@section('body')
<div class="main-content">
<section class="section">
    <div class="section-header">
        <h1>Aktivitas User</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Log Activity</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        {{ $log_activities->links() }}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                                @if ($log_activities->count() != 0)
                                    @foreach ($log_activities as $log_activity )
                                    <tr>
                                        <td>{{ $log_activity->created_at }}</td>
                                        <td>
                                            @if ($log_activity->action == 'make')
                                                Anda Telah Membuat
                                            @endif
                                            @if ($log_activity->action == 'update')
                                                Anda Telah Mengubah
                                            @endif
                                            @if ($log_activity->action == 'remove')
                                                Anda Telah Menghapus
                                            @endif

                                            @if ($log_activity->question_grid_header != null)
                                                Kisi - Kisi Soal {{ $log_activity->question_grid_header->type.', '.$log_activity->question_grid_header->school_year.', '.$log_activity->question_grid_header->study->name.' ('.$log_activity->question_grid_header->grade_generalization->name.'/'.$log_activity->question_grid_header->semesters.') '.$log_activity->question_grid_header->curriculum }}
                                            @endif
                                            @if ($log_activity->question_card_header != null)
                                                Kartu Soal {{ $log_activity->question_card_header->type.', '.$log_activity->question_card_header->school_year.', '.$log_activity->question_card_header->study->name.' ('.$log_activity->question_card_header->grade_generalization->name.'/'.$log_activity->question_card_header->semesters.') '.$log_activity->question_card_header->curriculum }}
                                            @endif
                                            
                                            @if ($log_activity->action == 'used')
                                                Telah digunakan oleh {{ $log_activity->used_for_user->teacher->name }}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">
                                            Belum Ada Aktivitas Yang Anda Lakukan atau Kepada Anda
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
</div>
@endsection