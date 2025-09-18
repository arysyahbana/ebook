@extends('admin.app')

@section('title', 'Detail')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Detail History</h6>
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach ($quiz as $data)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $data->id }}-tab"
                                        data-bs-toggle="tab" data-bs-target="#materi-{{ $data->id }}" type="button"
                                        role="tab">Materi {{ $data->id }}</button>
                                </li>
                            @endforeach

                            @if ($quiz->isNotEmpty())
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="semua-materi-tab" data-bs-toggle="tab"
                                        data-bs-target="#semuamateri" type="button" role="tab">Semua Materi</button>
                                </li>
                            @endif
                        </ul>

                        <div class="tab-content mt-3">
                            @foreach ($quiz as $data)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                    id="materi-{{ $data->id }}" role="tabpanel">
                                    <div class="table-responsive p-0">
                                        @foreach ($data->rQuiz as $keyQuiz => $quiz)
                                            @if ($keyQuiz == 0)
                                                {{-- Total Skor --}}
                                                <div class="d-flex flex-column flex-md-row justify-content-end">
                                                    <div class="card bg-light text-center shadow-sm px-4 py-2">
                                                        <h5 class="mb-0">Total Skor</h5>
                                                        <span
                                                            class="badge bg-success fs-4 mt-1">{{ $data->nilaiMahasiswa }}</span>
                                                    </div>
                                                </div>
                                                {{-- end Total Skor --}}
                                            @endif
                                            {{-- soal 1 --}}
                                            <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                                <div class="d-flex flex-column flex-md-row gap-3">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex gap-2">
                                                            <div>{{ $loop->iteration }}</div>
                                                            <div class="flex-grow-1">
                                                                @if ($quiz->file)
                                                                    <div class="overflow-hidden rounded mb-3"
                                                                        style="max-width: 30rem; max-height: 30rem;">
                                                                        <img src="{{ asset('dist/assets/img/quiz/' . $quiz->file) }}"
                                                                            alt="" class="w-100 h-100 object-cover">
                                                                    </div>
                                                                @endif
                                                                <p>{{ $quiz->soal }}</p>
                                                                <div class="mt-2">
                                                                    @foreach ($quiz->pilihan as $key => $jawaban)
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="jawaban{{ $quiz->id }}"
                                                                                value="{{ $key }}"
                                                                                @checked($quiz->jawabanMahasiswa == $key)>
                                                                            <label class="form-check-label"
                                                                                for="a">{{ $jawaban }}</label>
                                                                            &nbsp;
                                                                            @if ($quiz->jawaban_benar == $key)
                                                                                <i
                                                                                    class="bi bi-check-lg text-success h5"></i>
                                                                            @else
                                                                                <i class="bi bi-x text-danger h5"></i>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex gap-3 mt-5">
                                                                        @if ($quiz->fileJawabanMahasiswa)
                                                                            <a href="{{ asset('dist/assets/img/jawaban_mahasiswa/' . $data->userId . '/' . $quiz->fileJawabanMahasiswa) }}"
                                                                                class="btn btn-primary" target="_blank">
                                                                                Lihat Berkas
                                                                            </a>
                                                                        @endif

                                                                        {{-- lihat semua berkas mahasiswa --}}
                                                                        <a href="3" class="btn btn-info"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modalSemuaMahasiswa-{{ $quiz->id }}">
                                                                            Lihat Berkas Semua Mahasiswa
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                            </div>
                                            {{-- end soal 1 --}}

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalSemuaMahasiswa-{{ $quiz->id }}"
                                                tabindex="-1" aria-labelledby="modalSemuaMahasiswaLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl"> {{-- modal besar --}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalSemuaMahasiswaLabel">Berkas
                                                                Semua Mahasiswa - Quiz Materi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex flex-wrap gap-3 justify-content-start">
                                                                @foreach ($imageAllStudent as $imageStudent)
                                                                    @if ($quiz->id == $imageStudent->quiz_id)
                                                                        <!-- Item 1 -->
                                                                        <div class="text-center" style="width: 150px;">
                                                                            <a href="{{ asset('dist/assets/img/jawaban_mahasiswa/' . $imageStudent->user_id . '/' . $imageStudent->file) }}"
                                                                                target="_blank">
                                                                                <img src="{{ asset('dist/assets/img/jawaban_mahasiswa/' . $imageStudent->user_id . '/' . $imageStudent->file) }}"
                                                                                    class="img-fluid rounded mb-2"
                                                                                    alt="{{ $imageStudent->name }}">
                                                                            </a>
                                                                            <p class="mb-0">{{ $imageStudent->name }} - {{ json_encode($imageStudent) }}</p>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            @endforeach

                            <div class="tab-pane fade" id="semuamateri" role="tabpanel">
                                @foreach ($quizSemuaMateri as $keySemuaMateri => $semuaMateri)
                                    <div class="table-responsive p-0">
                                        @if ($keySemuaMateri == 0)
                                            {{-- Total Skor --}}
                                            <div class="d-flex flex-column flex-md-row justify-content-end">
                                                <div class="card bg-light text-center shadow-sm px-4 py-2">
                                                    <h5 class="mb-0">Total Skor</h5>
                                                    <span
                                                        class="badge bg-success fs-4 mt-1">{{ $data->nilaiMahasiswa }}</span>
                                                </div>
                                            </div>
                                            {{-- end Total Skor --}}
                                        @endif

                                        {{-- soal --}}
                                        <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                            <div class="d-flex flex-column flex-md-row gap-3">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex gap-2">
                                                        <div>{{ $loop->iteration }}</div>
                                                        <div class="flex-grow-1">
                                                            @if ($semuaMateri->file)
                                                                <div class="overflow-hidden rounded mb-3"
                                                                    style="max-width: 30rem; max-height: 30rem;">
                                                                    <img src="{{ asset('dist/assets/img/quiz/' . $semuaMateri->file) }}"
                                                                        alt="" class="w-100 h-100 object-cover">
                                                                </div>
                                                            @endif
                                                            <p>{{ $semuaMateri->soal }}</p>

                                                            <div class="mt-2">
                                                                @foreach ($semuaMateri->pilihan as $key => $jawaban)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jawaban{{ $semuaMateri->id }}"
                                                                            value="{{ $key }}"
                                                                            @checked($semuaMateri->jawabanMahasiswa == $key)>
                                                                        <label class="form-check-label"
                                                                            for="a">{{ $jawaban }}</label>
                                                                        &nbsp;
                                                                        @if ($semuaMateri->jawaban_benar == $key)
                                                                            <i class="bi bi-check-lg text-success h5"></i>
                                                                        @else
                                                                            <i class="bi bi-x text-danger h5"></i>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                                <div class="d-flex gap-3 mt-5">
                                                                    <a href="{{ asset('dist/assets/img/jawaban_mahasiswa/' . $data->userId . '/' . $semuaMateri->fileJawabanMahasiswa) }}"
                                                                        class="btn btn-primary" target="_blank">Lihat
                                                                        Berkas</a>
                                                                    {{-- lihat semua berkas mahasiswa --}}
                                                                    <a href="3" class="btn btn-info"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalSemuaMahasiswaAll">
                                                                        Lihat Berkas Semua Mahasiswa
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        </div>
                                        {{-- end soal --}}
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalSemuaMahasiswaAll" tabindex="-1"
                                        aria-labelledby="modalSemuaMahasiswaLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl"> {{-- modal besar --}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalSemuaMahasiswaLabel">Berkas Semua
                                                        Mahasiswa - Quiz Seluruh Materi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="d-flex flex-wrap gap-3 justify-content-start">

                                                        @foreach ($imageAllStudent as $imageStudent)
                                                            @if ($semuaMateri->id == $imageStudent->quiz_id)
                                                                <!-- Item 1 -->
                                                                <div class="text-center" style="width: 150px;">
                                                                    <a href="{{ asset('dist/assets/img/jawaban_mahasiswa/' . $imageStudent->user_id . '/' . $imageStudent->file) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('dist/assets/img/jawaban_mahasiswa/' . $imageStudent->user_id . '/' . $imageStudent->file) }}"
                                                                            class="img-fluid rounded mb-2" alt="{{ $imageStudent->name }}">
                                                                    </a>
                                                                    <p class="mb-0">{{ $imageStudent->name }}</p>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
                radio.addEventListener("click", function(event) {
                    event.preventDefault(); // Mencegah perubahan pilihan
                });
            });
        });
    </script>
@endsection
