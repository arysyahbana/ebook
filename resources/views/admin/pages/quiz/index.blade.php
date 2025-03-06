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
                                    <button class="nav-link active" id="{{$data->id}}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{{$data->id}}" type="button" role="tab">Materi {{$data->id}}</button>
                                </li>
                            @endforeach
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="semua-materi-tab" data-bs-toggle="tab"
                                    data-bs-target="#semuamateri" type="button" role="tab">Semua Materi</button>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="{{$data->id}}" role="tabpanel">
                                <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                    <!-- Soal 1 -->
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex gap-2">
                                                <div>1.</div>
                                                <div class="flex-grow-1">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <div class="mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="a">
                                                            <label class="form-check-label">a. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="b">
                                                            <label class="form-check-label">b. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="c">
                                                            <label class="form-check-label">c. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="d">
                                                            <label class="form-check-label">d. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="e">
                                                            <label class="form-check-label">e. Lorem</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('quiz.edit') }}" class="btn bg-gradient-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                <span class="text-capitalize ms-1">Edit</span>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <!-- Soal 2 -->
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex gap-2">
                                                <div>2.</div>
                                                <div class="flex-grow-1">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <div class="mt-2">
                                                        <textarea class="form-control bg-light w-100 w-md-75" rows="4"
                                                            name="jawaban_2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('quiz.edit') }}" class="btn bg-gradient-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                <span class="text-capitalize ms-1">Edit</span>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <!-- Soal 3 -->
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex gap-2">
                                                <div>3.</div>
                                                <div class="flex-grow-1">
                                                    <div class="overflow-hidden rounded mb-3"
                                                        style="max-width: 30rem; max-height: 30rem;">
                                                        <img src="{{ asset('dist/assets/img/banner.jpg') }}" alt=""
                                                            class="w-100 h-100 object-cover">
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <div class="mt-2">
                                                        <textarea class="form-control bg-light w-100 w-md-75" rows="4"
                                                            name="jawaban_2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('quiz.edit') }}" class="btn bg-gradient-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                <span class="text-capitalize ms-1">Edit</span>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <!-- Soal 4 -->
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex gap-2">
                                                <div>4.</div>
                                                <div class="flex-grow-1">
                                                    <div class="overflow-hidden rounded mb-3"
                                                        style="max-width: 30rem; max-height: 30rem;">
                                                        <img src="{{ asset('dist/assets/img/banner.jpg') }}" alt=""
                                                            class="w-100 h-100 object-cover">
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <div class="mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_3"
                                                                value="a">
                                                            <label class="form-check-label">a. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_3"
                                                                value="b">
                                                            <label class="form-check-label">b. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_3"
                                                                value="c">
                                                            <label class="form-check-label">c. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_3"
                                                                value="d">
                                                            <label class="form-check-label">d. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_3"
                                                                value="e">
                                                            <label class="form-check-label">e. Lorem</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('quiz.edit') }}" class="btn bg-gradient-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                <span class="text-capitalize ms-1">Edit</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="semuamateri" role="tabpanel">
                                <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                    <!-- Soal 1 -->
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <div class="flex-grow-1">
                                            <div class="d-flex gap-2">
                                                <div>1.</div>
                                                <div class="flex-grow-1">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <div class="mt-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="a">
                                                            <label class="form-check-label">a. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="b">
                                                            <label class="form-check-label">b. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="c">
                                                            <label class="form-check-label">c. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="d">
                                                            <label class="form-check-label">d. Lorem</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban_1"
                                                                value="e">
                                                            <label class="form-check-label">e. Lorem</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('quiz.edit') }}" class="btn bg-gradient-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                <span class="text-capitalize ms-1">Edit</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
@endsection