@extends('user.layouts.app')
@section('title', 'Materi')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center" id="default-styled-tab"
                data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-sky-500 hover:text-sky-500 border-sky-500"
                data-tabs-inactive-classes="text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300"
                role="tablist">
                @foreach ($materiData as $data)
                    {{-- materi 1 --}}
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg {{ $data->isActive ? 'active' : 'opacity-50 cursor-not-allowed' }}"
                            id="materi{{ $data->id }}-styled-tab" data-tabs-target="#styled-materi-{{ $data->id }}"
                            type="button" role="tab" aria-controls="materi{{ $data->id }}"
                            aria-selected="{{ $data->isActive ? 'true' : 'false' }}"
                            {{ $data->isDisabled ? 'disabled' : '' }}
                            title="{{ $data->isDisabled ? 'Selesaikan materi sebelumnya terlebih dahulu' : '' }}">
                            <i class="fas fa-book"></i>&nbsp;&nbsp;{{ $data->nama_materi }}
                        </button>
                    </li>
                    {{-- end materi 1 --}}
                @endforeach

                @if ($materi->isNotEmpty())
                    {{-- quiz all --}}
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300
                        {{ $quizSemuaMateriDisabled ? 'opacity-50 cursor-not-allowed' : '' }}"
                            id="quizall-styled-tab" data-tabs-target="#styled-quizall" type="button" role="tab"
                            aria-controls="quizall" aria-selected="false" {{ $quizSemuaMateriDisabled ? 'disabled' : '' }}
                            title="{{ $quizSemuaMateriDisabled ? 'Selesaikan semua materi terlebih dahulu' : '' }}">
                            <i class="fas fa-book"></i>&nbsp;&nbsp;Quiz Semua Materi
                        </button>
                    </li>
                    {{-- end quiz all --}}
                @endif

            </ul>
        </div>

        <div id="default-styled-tab-content">
            @foreach ($materi as $data)
                @guest
                    <div class="hidden p-4 rounded-lg" id="styled-materi-{{ $data->id }}" role="tabpanel"
                        aria-labelledby="materi{{ $data->id }}-tab">
                        <img src="{{ asset('dist/assets/img/logindulu.png') }}" alt="" class="mx-auto mb-0">
                        <h1 class="text-center text-2xl font-bold text-sky-500">Silahkan Login Dulu Untuk Mengakses Materi dan
                            Quiz</h1>
                    </div>
                @else
                    {{-- materi 1 --}}
                    <div class="hidden p-4 rounded-lg" id="styled-materi-{{ $data->id }}" role="tabpanel"
                        aria-labelledby="materi{{ $data->id }}-tab">
                        <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up"
                            data-aos-duration="1500">
                            <div class="flex justify-between">
                                <div class="min-h-full w-full">
                                    <div class="flex items-center">
                                        <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                                            <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg"
                                                data-aos="zoom-in" data-aos-duration="1700">
                                                <div class="text-3xl md:text-4xl lg:text-6xl font-bold text-white">{{ $loop->iteration < 10 ? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) : $loop->iteration }}</div>
                                            </div>
                                        </div>
                                        <p class="text-5xl font-semibold text-sky-500 px-12">{{ $data->judul_materi }}</p>
                                    </div>

                                    <div class="px-12 pt-5 pb-12">
                                        @if ($data->video_materi)
                                            <div class="overflow-hidden h-full w-full rounded-xl mx-auto my-12">
                                                <video class="w-full h-full object-cover" controls>
                                                    <source
                                                        src="{{ asset('dist/assets/video/materi/' . $data->video_materi) }}"
                                                        type="video/mp4">
                                                    Browser Anda tidak mendukung tag video.
                                                </video>
                                            </div>
                                        @endif

                                        <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                            <p class="text-slate-600 text-base leading-relaxed">
                                                {!! $data->isi_materi !!}
                                            </p>
                                        </div>


                                        <div class="flex justify-end gap-3 text-sm mt-6">
                                            <a href="{{ route('user.index.quiz', $data->id) }}"
                                                class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 @guest pointer-events-none opacity-50 @endguest">Quiz</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                                <div
                                    class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end materi 1 --}}
                @endguest
            @endforeach

            {{-- quiz all --}}
            <div class="hidden p-4 rounded-lg" id="styled-quizall" role="tabpanel" aria-labelledby="quizall-tab">
                <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up"
                    data-aos-duration="1500">
                    <div class="flex justify-between">
                        <div class="min-h-full w-full">
                            <div class="flex items-center">
                                <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                                    <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg"
                                        data-aos="zoom-in" data-aos-duration="1700">
                                        <div class="text-3xl md:text-4xl lg:text-6xl font-bold text-white"><i
                                                class="fas fa-book"></i></div>
                                    </div>
                                </div>
                                <p class="text-5xl font-semibold text-sky-500 px-12"> Quiz Seluruh Materi</p>
                            </div>

                            <div class="px-4 sm:px-12 pt-5 pb-12 text-slate-800">
                                <div class="border-l-4 border-sky-500 pl-3 sm:pl-6 mt-6 space-y-10">
                                    <form id="quizForm">
                                        @csrf
                                        @foreach ($quizSemuaMateri as $semuaMateri)
                                            <input type="hidden" id="materi_id" value="{{ $semuaMateri->materi }}">
                                            @if ($semuaMateri->tipe_soal == 'Objektif' || $semuaMateri->tipe_soal == 'Objektif Bergambar')
                                                <div class="flex flex-col md:flex-row gap-5 mb-10">
                                                    <div class="flex-1">
                                                        <div class="flex gap-3">
                                                            <div>{{ $loop->iteration }}</div>
                                                            <div class="flex-1">
                                                                @if ($semuaMateri->file)
                                                                    <div
                                                                        class="overflow-hidden max-h-[30rem] max-w-[30rem] rounded-xl mb-5">
                                                                        <img src="{{ asset('dist/assets/img/quiz/' . $semuaMateri->file) }}"
                                                                            alt=""
                                                                            class="w-full h-full object-cover">
                                                                    </div>
                                                                @endif
                                                                <p>{{ $semuaMateri->soal }}</p>
                                                                @if ($semuaMateri->tipe_soal == 'Objektif' || $semuaMateri->tipe_soal == 'Objektif Bergambar')
                                                                    @foreach ($semuaMateri->pilihan as $key => $jawaban)
                                                                        <div class="mt-2 space-y-2">
                                                                            <label class="flex items-center gap-2">
                                                                                <input type="radio"
                                                                                    name="jawaban{{ $semuaMateri->id }}"
                                                                                    value="{{ $key }}"
                                                                                    class="w-4 h-4 text-blue-500">
                                                                                <span>{{ $jawaban }}</span>
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <p>Belum ada soal</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-3">
                                                        <div id="previewContainer{{ $semuaMateri->id }}"
                                                            class="ml-3 hidden overflow-hidden">
                                                            <img id="previewImage{{ $semuaMateri->id }}" src=""
                                                                alt="Preview"
                                                                class="w-24 h-24 rounded-lg shadow-md object-cover">
                                                        </div>

                                                        <div class="flex justify-start md:justify-end">
                                                            <label for="fileUpload{{ $semuaMateri->id }}"
                                                                class="bg-orange-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer text-center">
                                                                Upload
                                                            </label>
                                                            <input type="file" id="fileUpload{{ $semuaMateri->id }}"
                                                                class="hidden"
                                                                name="upload_jawaban_{{ $semuaMateri->id }}"
                                                                accept="image/*"
                                                                onchange="previewImage(event, {{ $semuaMateri->id }})">
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
                        <div
                            class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg">
                        </div>
                    </div>
                </div>
            </div>
            {{-- end quiz all --}}

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
            <h3 class="text-lg text-center mb-8" id="modal-message"></h3>
            <h1 class="text-center text-8xl font-bold mb-12" id="skor"></h1>
            <div class="flex justify-center items-center gap-3">
                <a id="ulang-btn" href="#"
                    class="bg-red-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300 text-sm">Ulangi</a>
                <a id="lanjut-btn" href="#"
                    class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 text-sm">Lanjutkan</a>
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
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove("hidden"); // Tampilkan preview
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }


        function submitQuiz() {
            let jawaban = [];
            let fileReadPromises = [];
            let kkm = {{ $kkm }};

            // Iterasi semua radio button yang dipilih
            document.querySelectorAll("input[type='radio']:checked").forEach((el) => {
                let quiz_id = el.name.replace("jawaban", "");
                let pilihan = el.value;

                // Cek apakah ada file yang diupload
                let fileInput = document.querySelector(`input[name='upload_jawaban_${quiz_id}']`);
                let file_upload = fileInput && fileInput.files.length > 0;

                let jawabanItem = {
                    quiz_id: parseInt(quiz_id),
                    pilihan: pilihan,
                };

                // Jika ada file, baca sebagai Data URL
                if (file_upload) {
                    let file = fileInput.files[0];
                    let filePromise = new Promise((resolve) => {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            jawabanItem.file = e.target.result; // Simpan file sebagai Data URL
                            resolve();
                        };
                        reader.readAsDataURL(file);
                    });
                    fileReadPromises.push(filePromise);
                }

                jawaban.push(jawabanItem);
            });

            // Tunggu semua file dibaca
            Promise.all(fileReadPromises).then(() => {
                // Buat objek data untuk dikirim
                let data = {
                    materi_id: 'semuaMateri',
                    jawaban: jawaban
                };

                // Kirim data dengan fetch
                $.ajax({
                    url: "{{ route('user.quiz.store') }}",
                    type: "POST",
                    dataType: "json",
                    contentType: "application/json",
                    data: JSON.stringify(data),
                    headers: {
                        "X-CSRF-TOKEN": $("input[name=_token]").val()
                    },
                    success: function(response) {
                        closeModal("my_modal_1");

                        let skor = response.skor;
                        let isLastMateri = response.isLastMateri;

                        document.getElementById("skor").innerText = skor;

                        if (skor >= kkm) {
                            document.getElementById("modal-message").innerText =
                                "Selamat Anda Lulus, Silahkan Lihat Leaderboard";

                            let nextUrl = "{{ route('index.leaderboard') }}"

                            document.getElementById("lanjut-btn").href = nextUrl;
                        } else {
                            document.getElementById("modal-message").innerText =
                                "Maaf nilai Anda Tidak Mencapat KKM, Jika Sudah Pernah Menyelesaikan Quiz Dan Nilai Diatas KKM maka Yang Disimpan Nilai Dan Jawaban Lama";
                            document.getElementById("ulang-btn").href =
                                "{{ route('index') }}";
                            document.getElementById('lanjut-btn').hidden = true
                        }

                        setTimeout(() => {
                            openModal("my_modal_2");
                        }, 300);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        }

        function switchTab(tabId) {
            // Tutup modal kedua sebelum berpindah tab
            document.getElementById("my_modal_2").classList.remove("modal-open");

            let tabButton = document.getElementById(tabId);
            if (tabButton) {
                setTimeout(() => {
                    tabButton.click(); // Simulasikan klik untuk membuka tab
                }, 300); // Delay biar transisi lebih smooth
            }
        }
    </script>
@endsection
