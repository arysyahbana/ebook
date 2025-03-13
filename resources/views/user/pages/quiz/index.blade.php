@extends('user.layouts.app')
@section('title', 'Quiz')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
        <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up"
            data-aos-duration="1500">
            <div class="flex justify-between">
                <div class="min-h-full w-full">
                    <div class="flex items-center">
                        <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                            <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg"
                                data-aos="zoom-in" data-aos-duration="1700">
                                <div class="text-3xl md:text-4xl lg:text-6xl font-bold text-white">01</div>
                            </div>
                        </div>
                        <p class="text-5xl font-semibold text-sky-500 px-12"> Quiz {{ $materi->judul_materi ?? '' }}</p>
                    </div>

                    <div class="px-4 sm:px-12 pt-5 pb-12 text-slate-800">
                        <div class="border-l-4 border-sky-500 pl-3 sm:pl-6 mt-6 space-y-10">
                            <form id="quizForm" enctype="multipart/form-data">
                                @csrf
                                @foreach ($quiz as $data)
                                    <input type="hidden" id="materi_id" value="{{ $data->materi }}">
                                    @if ($data->tipe_soal == 'Objektif' || $data->tipe_soal == 'Objektif Bergambar')
                                        <div class="flex flex-col md:flex-row gap-5 mb-10">
                                            <div class="flex-1">
                                                <div class="flex gap-3">
                                                    <div>{{ $loop->iteration }}</div>
                                                    <div class="flex-1">
                                                        @if ($data->file)
                                                            <div class="overflow-hidden max-h-[30rem] max-w-[30rem] rounded-xl mb-5">
                                                                <img src="{{ asset('dist/assets/img/quiz/' . $data->file) }}" alt=""
                                                                    class="w-full h-full object-cover">
                                                            </div>
                                                        @endif

                                                        <p>{{ $data->soal }}</p>

                                                        {{-- @if ($data->tipe_soal == 'Uraian' || $data->tipe_soal == 'Uraian
                                                        Bergambar')
                                                        <div class="mt-2">
                                                            <textarea
                                                                class="textarea textarea-bordered bg-[#F3F3F3] w-full md:w-[90%]"
                                                                rows="4" name="jawaban_uraian{{ $data->id }}"></textarea>
                                                        </div>
                                                        @else --}}
                                                        @foreach ($data->pilihan as $key => $jawaban)
                                                            <div class="mt-2 space-y-2">
                                                                <label class="flex items-center gap-2">
                                                                    <input type="radio" name="jawaban{{ $data->id }}" value="{{ $key }}"
                                                                        class="w-4 h-4 text-blue-500">
                                                                    <span>{{ $jawaban }}</span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        {{-- @endif --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-3">
                                                <div id="previewContainer{{ $data->id }}" class="ml-3 hidden overflow-hidden">
                                                    <img id="previewImage{{ $data->id }}" src="" alt="Preview"
                                                        class="w-24 h-24 rounded-lg shadow-md object-cover">
                                                </div>

                                                <div class="flex justify-start md:justify-end">
                                                    <label for="fileUpload{{ $data->id }}"
                                                        class="bg-orange-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer text-center">
                                                        Upload
                                                    </label>
                                                    <input type="file" id="fileUpload{{ $data->id }}" class="hidden"
                                                        name="upload_jawaban_{{ $data->id }}" accept="image/*"
                                                        onchange="previewImage(event, {{ $data->id }})">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </form>
                        </div>

                        <div class="flex justify-end gap-3 text-sm mt-6">
                            <a href="#"
                                class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300"
                                onclick="openModal('my_modal_1')">Selesai</a>

                        </div>
                    </div>

                </div>

                <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pertama -->
    <div id="my_modal_1" class="modal">
        <div class="modal-box bg-white text-slate-800 relative">
            <h3 class="text-lg font-bold">Akhiri Quiz</h3>
            <img src="{{ asset('dist/assets/img/clock.gif') }}" alt="" class="w-36 mx-auto">
            <p class="text-center">Yakin ingin akhiri quiz?</p>
            <div class="modal-action">
                <button
                    class="bg-red-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300"
                    onclick="closeModal('my_modal_1')">
                    Tidak
                </button>
                <button
                    class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300"
                    onclick="submitQuiz()">
                    Yakin
                </button>
            </div>
        </div>
    </div>


    <!-- Modal Kedua -->
    <div id="my_modal_2" class="modal">
        <div class="modal-box bg-white text-slate-700">
            <h3 class="text-lg text-center mb-8">Selamat Anda Lulus</h3>
            <h1 class="text-center text-8xl font-bold mb-12" id="skor"></h1>
            <div class="flex justify-center items-center gap-3">
                {{-- <a href="{{ route('index.quiz') }}"
                    class="bg-red-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300 text-sm">Ulangi</a>
                <a href="{{ route('materi2') }}"
                    class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 text-sm">Lanjutkan</a>
                --}}
            </div>
        </div>
    </div>

    {{-- js modal --}}
    <script>
        function openModal(id) {
            document.getElementById(id).classList.add("modal-open");
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove("modal-open");
        }

        function previewImage(event, id) {
            let fileInput = event.target;
            let previewContainer = document.getElementById(`previewContainer${id}`);
            let previewImage = document.getElementById(`previewImage${id}`);

            if (fileInput.files && fileInput.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove("hidden"); // Tampilkan preview
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function submitQuiz() {
            let materi_id = $("#materi_id").val();
            let jawaban = [];
            let fileReadPromises = [];

            // Iterasi semua radio button yang dipilih
            $("input[type='radio']:checked").each(function () {
                let quiz_id = $(this).attr("name").replace("jawaban", "");
                let pilihan = $(this).val();

                // Cek apakah ada file yang diupload
                let fileInput = $("input[name='upload_jawaban_" + quiz_id + "']");
                let file_upload = fileInput.length > 0 && fileInput[0].files.length > 0;

                let jawabanItem = {
                    quiz_id: parseInt(quiz_id),
                    pilihan: pilihan,
                };

                // Jika ada file, baca sebagai Data URL
                if (file_upload) {
                    let file = fileInput[0].files[0];
                    let filePromise = new Promise((resolve) => {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            jawabanItem.file = e.target.result; // Simpan file sebagai Data URL
                            resolve();
                        };
                        reader.readAsDataURL(file);
                    });
                    fileReadPromises.push(filePromise);
                }

                jawaban.push(jawabanItem);
            });

            // Tunggu semua file selesai dibaca
            Promise.all(fileReadPromises).then(() => {
                // Buat objek data untuk dikirim
                let data = {
                    materi_id: parseInt(materi_id),
                    jawaban: jawaban
                };

                $.ajax({
                    url: "{{ route('user.quiz.store') }}",
                    type: "POST",
                    dataType: "json",
                    contentType: "application/json",
                    data: JSON.stringify(data),
                    headers: {
                        "X-CSRF-TOKEN": $("input[name=_token]").val()
                    },
                    success: function (response) {
                        closeModal("my_modal_1");
                        console.log(response); // Debug: cek respons di console
                        document.getElementById("skor").innerText = response;
                        setTimeout(() => {
                            openModal("my_modal_2");
                        }, 300);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        }

    </script>


@endsection