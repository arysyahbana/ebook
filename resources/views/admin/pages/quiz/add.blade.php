@extends('admin.app')

@section('title', 'Create Quiz')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Tambah Data Quiz</h6>
                <div class="card mb-4">
                    <div class="card-body px-5 pt-5 pb-2">
                        <form action="{{ route('quiz.store') }}" method="post" enctype="multipart/form-data" id="quizForm">
                            @csrf

                            <label for="type">Tipe Soal</label>
                            <select class="form-select mb-3" name="tipe_soal" id="type">
                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                @foreach (["Objektif", "Objektif Bergambar"] as $tipe)
                                    <option value="{{ $tipe }}" @selected(old('tipe_soal') == $tipe)>{{ $tipe }}</option>
                                @endforeach
                            </select>

                            <label for="materi">Materi</label>
                            <select class="form-select mb-3" name="materi" id="materi">
                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                @foreach ($materi as $data)
                                    <option value="{{ $data->id }}" @selected(old('materi') == $data->id)>{{ $data->nama_materi }}
                                    </option>
                                @endforeach
                                <option value="semuaMateri" @selected(old('materi') == 'semuaMateri')>Semua Materi</option>
                            </select>

                            <div class="mb-3" id="fileContainer">
                                <label for="formFile" class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>

                            <label for="soal">Soal</label>
                            <textarea class="form-control mb-3" name="soal" id="soal" cols="20"
                                rows="5">{{ old('soal') }}</textarea>

                            {{-- <label for="skor">Skor</label>
                            <input type="number" class="form-control mb-3" name="skor" id="skor" min="0"
                                placeholder="Masukkan skor" value="{{ old('skor') }}"> --}}

                            <div id="answerContainer">
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
            const typeSelect = document.getElementById("type");
            const fileContainer = document.getElementById("fileContainer");
            const answerContainer = document.getElementById("answerContainer");
            const addAnswerButton = document.getElementById("addAnswer");
            const form = document.getElementById("quizForm");
            const warningModal = new bootstrap.Modal(document.getElementById("warningModal"));
            let answerIndex = 0;

            function toggleFields() {
                const selectedType = typeSelect.value;
                fileContainer.style.display = ["Objektif Bergambar", "Uraian Bergambar"].includes(selectedType) ? "block" : "none";
                answerContainer.style.display = ["Objektif", "Objektif Bergambar"].includes(selectedType) ? "block" : "none";
            }

            addAnswerButton.addEventListener("click", function () {
                let letter = String.fromCharCode(97 + answerIndex);
                let newAnswer = document.createElement("div");
                newAnswer.classList.add("d-flex", "gap-3", "mt-2");
                newAnswer.innerHTML = `
                        <div class="form-check col-6 d-flex align-items-center gap-3">
                            <input class="form-check-input" type="radio" name="jawaban_benar" value="${letter}">
                            <input type="text" class="form-control answer-input" name="pilihan[${letter}]">
                        </div>
                        <button type="button" class="btn btn-danger remove-answer mt-2"><i class="bi bi-dash-lg"></i></button>
                    `;
                answerContainer.appendChild(newAnswer);
                answerIndex++;
            });

            answerContainer.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-answer")) {
                    e.target.parentElement.remove();
                }
            });

            form.addEventListener("submit", function (event) {
                const selectedType = typeSelect.value;
                const selectedAnswer = document.querySelector('input[name="jawaban_benar"]:checked');
                if (["Objektif", "Objektif Bergambar"].includes(selectedType) && !selectedAnswer) {
                    event.preventDefault();
                    warningModal.show();
                }
            });

            typeSelect.addEventListener("change", toggleFields);
            toggleFields();
        });
    </script>
@endsection
