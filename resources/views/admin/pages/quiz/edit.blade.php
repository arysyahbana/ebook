@extends('admin.app')

@section('title', 'Edit Quiz')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Edit Data Quiz</h6>
                <div class="card mb-4">
                    <div class="card-body px-5 pt-5 pb-2">
                        <form action="{{ route('quiz.update', $quiz->id) }}" method="post" enctype="multipart/form-data"
                            id="quizForm">
                            @csrf

                            <label for="tipe_soal">Tipe Soal</label>
                            <select class="form-select mb-3" name="tipe_soal" id="tipe_soal">
                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                @foreach(['Objektif', 'Objektif Bergambar'] as $option)
                                    <option value="{{ $option }}" @selected($quiz->tipe_soal == $option)>{{ $option }}</option>
                                @endforeach
                            </select>

                            <label for="materi">Materi</label>
                            <select class="form-select mb-3" name="materi">
                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                @foreach ($materi as $data)
                                    <option value="{{ $data->id }}" @selected($quiz->materi == $data->id)>{{ $data->nama_materi }}
                                    </option>
                                @endforeach
                                <option value="Semua Materi">Semua Materi</option>
                            </select>

                            <div class="mb-3" id="file">
                                <label for="formFile" class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>

                            <label for="soal">Soal</label>
                            <textarea class="form-control mb-3" name="soal" id="soal" cols="20"
                                rows="5">{{ trim($quiz->soal) }}</textarea>

                            {{-- <label for="skor">Skor</label>
                            <input type="number" class="form-control mb-3" name="skor" id="skor" min="0"
                                placeholder="Masukkan skor" value="{{ $quiz->skor }}"> --}}

                            <div id="answerContainer">
                                <label>Jawaban</label>
                                @foreach ($quiz->pilihan ?? [] as $key => $jawaban)
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="form-check col-6">
                                            <input class="form-check-input" type="radio" name="jawaban_benar" value="{{ $key }}"
                                                @checked($quiz->jawaban_benar == $key)>
                                            <input type="text" class="form-control d-inline answer-input"
                                                name="pilihan[{{ $key }}]" value="{{ $jawaban }}">
                                        </div>
                                        <button type="button" class="btn btn-danger remove-answer"><i
                                                class="fa fa-minus"></i></button>
                                    </div>
                                @endforeach
                                <button type="button" id="addAnswer" class="btn btn-primary mt-2"><i class="fa fa-plus"></i>
                                    Tambah Jawaban</button>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-admin.modal id="warningModal" title="Peringatan" label="warningModalLabel">
        Anda harus memilih salah satu jawaban sebagai kunci jawaban sebelum menyimpan!
    </x-admin.modal>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tipeSoalSelect = document.getElementById("tipe_soal");
            const fileDiv = document.getElementById("file");
            const answerContainer = document.getElementById("answerContainer");
            const addAnswerButton = document.getElementById("addAnswer");
            const form = document.getElementById("quizForm");
            const warningModal = new bootstrap.Modal(document.getElementById("warningModal"));

            function toggleFields() {
                const selectedType = tipeSoalSelect.value;
                fileDiv.style.display = selectedType.includes("Bergambar") ? "block" : "none";
                answerContainer.style.display = selectedType.includes("Objektif") ? "block" : "none";
            }

            form.addEventListener("submit", function (event) {
                const selectedType = tipeSoalSelect.value;
                const selectedAnswer = document.querySelector('input[name="jawaban_benar"]:checked');
                if (["Objektif", "Objektif Bergambar"].includes(selectedType) && !selectedAnswer) {
                    event.preventDefault();
                    warningModal.show();
                }
            });

            tipeSoalSelect.addEventListener("change", toggleFields);
            toggleFields();

            addAnswerButton.addEventListener("click", function () {
                const letter = String.fromCharCode(97 + document.querySelectorAll(".answer-input").length);
                const newAnswer = document.createElement("div");
                newAnswer.classList.add("d-flex", "gap-3", "align-items-center", "mt-2");
                newAnswer.innerHTML = `
                        <div class="form-check col-6">
                            <input class="form-check-input" type="radio" name="jawaban_benar" value="${letter}">
                            <input type="text" class="form-control d-inline answer-input" name="pilihan[${letter}]" placeholder="Jawaban ${letter.toUpperCase()}">
                        </div>
                        <button type="button" class="btn btn-danger remove-answer"><i class="fa fa-minus"></i></button>
                    `;
                answerContainer.appendChild(newAnswer);
            });

            answerContainer.addEventListener("click", function (e) {
                if (e.target.closest(".remove-answer")) {
                    e.target.closest(".d-flex").remove();
                }
            });
        });
    </script>
@endsection