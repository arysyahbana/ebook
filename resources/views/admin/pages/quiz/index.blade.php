@extends('admin.app')

@section('title', 'Quiz')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Quiz</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <a href="{{ route('quiz.create') }}" class="btn bg-gradient-success"><i class="fa fa-plus"
                                aria-hidden="true"></i><span class="text-capitalize ms-1">Tambah</span></a>
                    </div>
                    <div class="card-body px-5 pt-3 pb-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            @foreach ($quiz as $data)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{$data->id}}-tab"
                                        data-bs-toggle="tab" data-bs-target="#materi-{{$data->id}}" type="button"
                                        role="tab">Materi {{$data->id}}</button>
                                </li>
                            @endforeach

                            @if($quiz->isNotEmpty())
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="semua-materi-tab" data-bs-toggle="tab"
                                        data-bs-target="#semuamateri" type="button" role="tab">Semua Materi</button>
                                </li>
                            @endif
                        </ul>

                        <div class="tab-content mt-3">
                            @foreach ($quiz as $data)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="materi-{{$data->id}}"
                                    role="tabpanel">
                                    @foreach ($data->rQuiz as $quiz)
                                        <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                            <div class="d-flex flex-column flex-md-row gap-3">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex gap-2">
                                                        <div>{{$loop->iteration}}</div>
                                                        <div class="flex-grow-1">
                                                            @if($quiz->file)
                                                                <div class="overflow-hidden rounded mb-3"
                                                                    style="max-width: 30rem; max-height: 30rem;">
                                                                    <img src="{{ asset('dist/assets/img/quiz/' . $quiz->file) }}" alt=""
                                                                        class="w-100 h-100 object-cover">
                                                                </div>
                                                            @endif

                                                            <p>{{$quiz->soal}}</p>
                                                            @if($quiz->tipe_soal == 'Objektif' || $quiz->tipe_soal == 'Objektif Bergambar')
                                                                @foreach ($quiz->pilihan as $key => $jawaban)
                                                                    <div class="mt-2">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="jawaban{{ $quiz->id }}" value="{{$key}}"
                                                                                @checked($quiz->jawaban_benar == $key)>
                                                                            <label class="form-check-label">{{$jawaban}}</label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <p>Belum ada soal</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <a href="{{ route('quiz.edit', ['id' => $quiz->id]) }}"
                                                        class="btn bg-gradient-warning">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                        <span class="text-capitalize ms-1">Edit</span>
                                                    </a>
                                                    <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                        data-bs-target="#hapusQuiz{{ $data->id }}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                        <span class="text-capitalize ms-1">Hapus</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        </div>
                                        <!-- Modal Hapus Quiz -->
                                        <div class="modal fade" id="hapusQuiz{{ $data->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusQuizLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusQuizLabel">Hapus Quiz
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('dist/assets/img/bin.gif') }}" alt=""
                                                            class="img-fluid w-25">
                                                        <p>Yakin ingin menghapus data?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('quiz.destroy', ['id' => $quiz->id]) }}" type="submit"
                                                            class="btn btn-sm btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            <div class="tab-pane fade" id="semuamateri" role="tabpanel">
                                @foreach ($quizSemuaMateri as $semuaMateri)
                                    <!-- semua materi -->
                                    <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                        <div class="d-flex flex-column flex-md-row gap-3">
                                            <div class="flex-grow-1">
                                                <div class="d-flex gap-2">
                                                    <div>{{$loop->iteration}}</div>
                                                    <div class="flex-grow-1">
                                                        @if($semuaMateri->file)
                                                            <div class="overflow-hidden rounded mb-3"
                                                                style="max-width: 30rem; max-height: 30rem;">
                                                                <img src="{{ asset('dist/assets/img/quiz/' . $semuaMateri->file) }}"
                                                                    alt="" class="w-100 h-100 object-cover">
                                                            </div>
                                                        @endif

                                                        <p>{{$semuaMateri->soal}}</p>
                                                        @if($semuaMateri->tipe_soal == 'Uraian' || $semuaMateri->tipe_soal == 'Uraian Bergambar')
                                                            <div class="mt-2">
                                                                <textarea class="form-control bg-light w-100 w-md-75" rows="4"
                                                                    name="jawaban"></textarea>
                                                            </div>

                                                        @else
                                                            @foreach ($semuaMateri->pilihan as $key => $jawaban)
                                                                <div class="mt-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jawaban{{ $semuaMateri->id }}" value="{{$key}}"
                                                                            @checked($semuaMateri->jawaban_benar == $key)>
                                                                        <label class="form-check-label">{{$jawaban}}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="{{ route('quiz.edit', ['id' => $semuaMateri->id]) }}"
                                                    class="btn bg-gradient-warning">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                    <span class="text-capitalize ms-1">Edit</span>
                                                </a>
                                                <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapusQuiz">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    <span class="text-capitalize ms-1">Hapus</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Hapus Quiz semau materi -->
                                    <div class="modal fade" id="hapusQuiz" data-bs-backdrop="static" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="hapusQuizLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="hapusQuizLabel">Hapus Quiz
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('dist/assets/img/bin.gif') }}" alt=""
                                                        class="img-fluid w-25">
                                                    <p>Yakin ingin menghapus data?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('quiz.destroy', ['id' => $semuaMateri->id]) }}"
                                                        type="submit" class="btn btn-sm btn-danger">Hapus</a>
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
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
        document.addEventListener("DOMContentLoaded", function () {
            let answerContainer = document.getElementById("answerContainer");
            let addAnswerButton = document.getElementById("addanswer");
            let answerIndex = 1; // Mulai dari 'b' karena 'a' sudah ada

            addAnswerButton.addEventListener("click", function () {
                let letter = String.fromCharCode(97 + answerIndex); // Konversi ke huruf a, b, c, ...

                let newAnswer = document.createElement("div");
                newAnswer.classList.add("d-flex", "gap-3", "mt-2");
                newAnswer.innerHTML = `
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1" value="${letter}" id="jawaban_1_${letter}">
                                                            <input type="text" class="form-control d-inline answer-input" name="jawaban_text_${letter}" placeholder="Jawaban ${letter}">
                                                        </div>
                                                        <button type="button" class="btn btn-danger remove-answer">x</button>
                                                    `;

                answerContainer.appendChild(newAnswer);
                answerIndex++;
            });

            answerContainer.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-answer")) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('input[type="radio"]').forEach(function (radio) {
                radio.addEventListener("click", function (event) {
                    event.preventDefault(); // Mencegah perubahan pilihan
                });
            });
        });
    </script>
@endsection
