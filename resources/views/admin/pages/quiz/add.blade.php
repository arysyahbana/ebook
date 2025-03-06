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
                                <option value="Objektif">Objektif</option>
                                <option value="Objektif Bergambar">Objektif Bergambar</option>
                                <option value="Uraian">Uraian</option>
                                <option value="Uraian Bergambar">Uraian Bergambar</option>
                            </select>

                            <Label>Materi</Label>
                            <select class="form-select mb-3" aria-label="Default select example" name="materi" id="materi">
                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                @foreach ($materi as $data )
                                    <option value="{{ $data->id }}">{{ $data->nama_materi }}</option>
                                @endforeach
                                <option value="semuaMateri">Semua Materi</option>
                            </select>

                            <div class="mb-3" id="file">
                                <label for="formFile" class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>

                            <label>Soal</label>
                            <textarea class="form-control mb-3" name="soal" id="soal" cols="20" rows="5"></textarea>

                            <label>Skor</label>
                            <input type="number" class="form-control mb-3" name="skor" id="skor" min="0"
                                placeholder="Masukkan skor">

                            {{-- <label>Jawaban</label>
                            <textarea class="form-control mb-3" name="jawaban" id="jawaban" cols="20" rows="5"></textarea>
                            --}}

                            <div id="answerContainer">
                                <div class="d-flex gap-3">
                                    <div class="form-check col-6">
                                        <input class="form-check-input" type="radio" name="jawaban_benar" value="a">
                                        <input type="text" class="form-control d-inline answer-input" name="pilihan[a]">
                                    </div>
                                    <button type="button" id="addanswer" class="btn btn-primary"><i class="fa fa-plus"></i></button>
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
                    <div class="form-check col-6">
                        <input class="form-check-input" type="radio" name="jawaban_benar" value="${letter}">
                        <input type="text" class="form-control d-inline answer-input" name="pilihan[${letter}]">
                    </div>
                    <button type="button" class="btn btn-danger remove-answer"><i class="fa fa-minus"></i></button>
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

            typeSelect.addEventListener("change", toggleFields);
            toggleFields(); // Panggil saat halaman dimuat untuk menangani nilai default
        });
    </script>
@endsection