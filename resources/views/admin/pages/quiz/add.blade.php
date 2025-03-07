@extends('admin.app')

@section('title', 'Create Quiz')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Tambah Data Quiz</h6>
                <div class="card mb-4">
                    <div class="card-body px-5 pt-5 pb-2">
                        <form action="{{ route('quiz.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <Label>Tipe Soal</Label>
                            <select class="form-select mb-3" aria-label="Default select example" name="tipe_soal" id="type">
                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                <option value="Objektif" @selected(old('tipe_soal') == 'Objektif')>Objektif</option>
                                <option value="Objektif Bergambar" @selected(old('tipe_soal') == 'Objektif Bergambar')>Objektif Bergambar</option>
                                <option value="Uraian" @selected(old('tipe_soal') == 'Uraian')>Uraian</option>
                                <option value="Uraian Bergambar" @selected(old('tipe_soal') == 'Uraian Bergambar')>Uraian Bergambar</option>
                            </select>

                            <Label>Materi</Label>
                            <select class="form-select mb-3" aria-label="Default select example" name="materi" id="materi">
                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                @foreach ($materi as $data )
                                    <option value="{{ $data->id }}" @selected(old('materi') == $data->id)>{{ $data->nama_materi }}</option>
                                @endforeach
                                <option value="semuaMateri" @selected(old('materi') == 'semuaMateri')>Semua Materi</option>
                            </select>

                            <div class="mb-3" id="file">
                                <label for="formFile" class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>

                            <label>Soal</label>
                            <textarea class="form-control mb-3" name="soal" id="soal" cols="20" rows="5">{{ old('soal') }}</textarea>

                            <label>Skor</label>
                            <input type="number" class="form-control mb-3" name="skor" id="skor" min="0"
                                placeholder="Masukkan skor" value="{{ old('skor') }}">

                            {{-- <label>Jawaban</label>
                            <textarea class="form-control mb-3" name="jawaban" id="jawaban" cols="20" rows="5"></textarea>
                            --}}

                            <div id="answerContainer">
                                <label class="form-label">Pilihan Objektif</label>
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="form-check col-6 d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="radio" name="jawaban_benar" value="a">
                                        <input type="text" class="form-control d-inline answer-input" name="pilihan[a]">
                                    </div>
                                    <button type="button" id="addanswer" class="btn btn-primary mt-2"><i class="bi bi-plus-lg"></i></button>
                                </div>
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

    <!-- Modal Peringatan -->
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="warningModalLabel">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda harus memilih salah satu jawaban sebagai kunci jawaban sebelum menyimpan!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                    <div class="form-check col-6 d-flex align-items-center gap-3">
                        <input class="form-check-input" type="radio" name="jawaban_benar" value="${letter}">
                        <input type="text" class="form-control d-inline answer-input" name="pilihan[${letter}]">
                    </div>
                    <button type="button" class="btn btn-danger remove-answer mt-2"><i class="bi bi-dash-lg"></i></button>
                `;

                answerContainer.appendChild(newAnswer);
                answerIndex++;
            });

            // Menghapus jawaban yang ditambahkan
            answerContainer.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-answer")) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const typeSelect = document.getElementById("type");
            const fileDiv = document.getElementById("file");
            const answerContainer = document.getElementById("answerContainer");
            const form = document.querySelector("form");
            const warningModal = new bootstrap.Modal(document.getElementById("warningModal"));

            function toggleFields() {
                const selectedType = typeSelect.value;

                if (selectedType === "Objektif") {
                    fileDiv.style.display = "none";
                    answerContainer.style.display = "block";
                } else if (selectedType === "Objektif Bergambar") {
                    fileDiv.style.display = "block";
                    answerContainer.style.display = "block";
                } else if (selectedType === "Uraian") {
                    fileDiv.style.display = "none";
                    answerContainer.style.display = "none";
                } else if (selectedType === "Uraian Bergambar") {
                    fileDiv.style.display = "block";
                    answerContainer.style.display = "none";
                } else {
                    fileDiv.style.display = "none";
                    answerContainer.style.display = "none";
                }
            }

            // Tambahkan event listener untuk form submit
            form.addEventListener("submit", function (event) {
                const selectedType = typeSelect.value;
                const selectedAnswer = document.querySelector('input[name="jawaban_benar"]:checked');

                // Hanya cek jawaban jika tipe soal adalah "Objektif" atau "Objektif Bergambar"
                if ((selectedType === "Objektif" || selectedType === "Objektif Bergambar") && !selectedAnswer) {
                    event.preventDefault(); // Hentikan form submit
                    warningModal.show(); // Tampilkan modal peringatan
                }
            });

            typeSelect.addEventListener("change", toggleFields);
            toggleFields(); // Panggil saat halaman dimuat untuk menangani nilai default
        });
    </script>
@endsection
