@extends('admin.master.main')
@section('body')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Kartu Soal</h1>
        <div class="section-header-breadcrumb">
            <a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Kartu Soal</h4>
                    <div class="card-header-form">
                        <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Kompetensi Dasar</th>
                            <th>Indikator</th>
                            <th>Nomor Soal</th>
                            <th>Buku Referensi</th>
                            <th>Pertanyaan</th>
                            <th>Kunci</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $no = 1;  
                        @endphp
                        @foreach ($question_cards as $question_card)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $question_card->question_grid->study->name }}</td>
                            <td>{{ $question_card->question_grid->basic_competency->name }}</td>
                            <td>{{ $question_card->question_grid->indicator }}</td>
                            <td>{{ $question_card->number }}</td>
                            <td>
                                @if ($question_card->reference_book_1 != null)
                                    {{ $question_card->reference_book_1 }}
                                @endif
                                @if ($question_card->reference_book_2 != null)
                                    , {{ $question_card->reference_book_2 }}
                                @endif
                                @if ($question_card->reference_book_3 != null)
                                    , {{ $question_card->reference_book_3 }}
                                @endif
                            </td>
                            <td>{{ $question_card->question }}</td>
                            <td>{{ $question_card->key }}</td>
                            <td>
                            <a href="{{ route('question-card.show', $question_card->id) }}" class="btn btn-info mb-2">Detail</a>
                            <form method="POST" action="{{ route('question-card.destroy', $question_card->id) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            </td>
                        </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
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