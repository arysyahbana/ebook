@extends('user.layouts.app')
@section('title', 'Materi')
@section('content')
    <style>
        #countdown-timer {
            animation: pulse 1s infinite alternate;
        }

        @keyframes pulse {
            from { opacity: 0.8; }
            to { opacity: 1; }
        }

        @media (max-width: 768px) {
            #countdown-timer {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        }
    </style>

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
                            class="inline-block p-4 border-b-2 rounded-t-lg
                                {{ $data->isActive ? 'active' : '' }}
                                {{ $data->isDisabled ? 'opacity-50 cursor-not-allowed' : '' }}"
                            id="materi{{ $data->id }}-styled-tab"
                            data-tabs-target="#styled-materi-{{ $data->id }}"
                            type="button" role="tab"
                            aria-controls="materi{{ $data->id }}"
                            aria-selected="{{ $data->isActive ? 'true' : 'false' }}"
                            {{ $data->isDisabled ? 'disabled' : '' }}>
                            <i class="fas fa-book"></i>&nbsp;&nbsp;{{ $data->nama_materi }}
                        </button>
                    </li>
                    {{-- end materi 1 --}}
                @endforeach

                @if ($materi->isNotEmpty())
                    {{-- quiz all --}}
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg
                                {{ session('last_tab') == 'quizall' ? 'active' : '' }}
                                {{ (!auth()->check() || !$allMateriFinished || $quizAllCheck->total_mengerjakan >= 1) ? 'opacity-50 cursor-not-allowed' : '' }}"
                            id="quizall-styled-tab"
                            data-tabs-target="#styled-quizall"
                            type="button"
                            role="tab"
                            aria-controls="quizall"
                            aria-selected="{{ session('last_tab') == 'quizall' ? 'true' : 'false' }}"
                            {{ (!auth()->check() || !$allMateriFinished || $quizAllCheck->total_mengerjakan >= 1) ? 'disabled' : '' }}>
                            <i class="fas fa-book"></i>&nbsp;&nbsp;Quiz Semua Materi
                        </button>
                    </li>
                    {{-- end quiz all --}}
                    {{-- {{ dd($quizAllCheck) }} --}}
                @endif

            </ul>
        </div>

        <div id="default-styled-tab-content" class="text-slate-800">
            @foreach ($materi as $data)
                @guest
                    <div class="hidden p-4 rounded-lg" id="styled-materi-{{ $data->id }}" role="tabpanel"
                        aria-labelledby="materi{{ $data->id }}-tab">
                        <img src="{{ asset('dist/assets/img/logindulu.png') }}" alt="" class="mx-auto mb-0">
                        <h1 class="text-center text-2xl font-bold text-sky-500">Silahkan Login Dulu Untuk Mengakses Materi dan
                            Quiz</h1>
                    </div>
                @else
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
                                <p class="text-5xl font-semibold text-sky-500 px-12 w-full"> Quiz Seluruh Materi</p>
                                <div class="flex justify-end w-full px-5">
                                    <div id="countdown-timer" class="bg-slate-100 text-xl font-semibold text-green-500 px-10 py-2 rounded-lg shadow"></div>
                                </div>
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
                                                                onchange="previewImage(event, {{ $semuaMateri->id }})" required>
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

     <!-- Loading Overlay -->
    <div id="loading-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 150"><path fill="none" stroke="#1095FF" stroke-width="15" stroke-linecap="round" stroke-dasharray="300 385" stroke-dashoffset="0" d="M275 75c0 31-27 50-50 50-58 0-92-100-150-100-28 0-50 22-50 50s23 50 50 50c58 0 92-100 150-100 24 0 50 19 50 50Z"><animate attributeName="stroke-dashoffset" calcMode="spline" dur="2" values="685;-685" keySplines="0 0 1 1" repeatCount="indefinite"></animate></path></svg>
            <p class="text-white">Mengupload jawaban...</p>
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
            <!-- Tempat GIF -->
            <img id="result-gif" src="" alt="Result" class="w-48 mx-auto mb-6 hidden">

            <h1 class="text-center text-8xl font-bold mb-12" id="skor"></h1>

            <h3 class="text-lg text-center mb-8" id="modal-message"></h3>

            <!-- Audio -->
            <audio id="result-sound"></audio>

            <div class="flex justify-center items-center gap-3">
                {{-- <a id="ulang-btn" href="#"
                    class="bg-red-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300 text-sm">Ulangi</a> --}}
                <a id="lanjut-btn" href="#"
                    class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 text-sm">Lanjutkan</a>
            </div>
        </div>
    </div>

    {{-- Modal Required File --}}
    <div id="missing_file_modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white text-slate-800 rounded-lg shadow-lg w-96 relative p-6">
            <h3 class="text-lg font-bold text-center mb-4">Upload Belum Lengkap</h3>
            <img src="{{ asset('dist/assets/img/warning.gif') }} " class="w-36 mx-auto" alt="Warning"
                class="w-28 mx-auto mb-4">
            <p class="text-center mb-6">Ada soal yang wajib upload file, silakan lengkapi dulu.</p>
            <div class="flex justify-center">
                <button
                    class="bg-red-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300"
                    onclick="document.getElementById('missing_file_modal').classList.add('hidden')">
                    Oke, Saya Lengkapi
                </button>
            </div>
        </div>
    </div>=

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

        let batas_waktu = "{{ $settings->batas_waktu ?? '' }}";
        let isTimeUp = false;


        function showLoadingOverlay(minTime = 0) {
            const el = document.getElementById("loading-overlay");
            el.dataset.startTime = Date.now();
            el.dataset.minTime = minTime;
            el.classList.remove("opacity-0", "pointer-events-none");
            el.classList.add("opacity-100", "pointer-events-auto");
        }

        function hideLoadingOverlay(callback) {
            const el = document.getElementById("loading-overlay");
            const startTime = parseInt(el.dataset.startTime || Date.now());
            const minTime = parseInt(el.dataset.minTime || 0);
            const elapsed = Date.now() - startTime;
            const remainingDelay = Math.max(0, minTime - elapsed);

            setTimeout(() => {
                el.classList.add("opacity-0", "pointer-events-none");
                el.classList.remove("opacity-100", "pointer-events-auto");

                if (typeof callback === "function") {
                    callback(); // jalankan aksi setelah loading hilang
                }
            }, remainingDelay);
        }

        function validateFiles() {
            let missing = Array.from(document.querySelectorAll("input[type='file']"))
                .some(el => el.hasAttribute("required") && el.files.length === 0);

            if (missing) {
                closeModal('my_modal_1');
                document.getElementById('missing_file_modal').classList.remove('hidden');
                return false;
            }
            return true;
        }

        function submitQuiz() {
            if (!validateFiles()) return;
            closeModal("my_modal_1");
            showLoadingOverlay(1000);

            let jawaban = [];
            let fileReadPromises = [];
            let kkm = {{ $kkm }};

            // Ambil semua quiz_id dari elemen radio button (misalnya dari name="jawaban1", "jawaban2", dst.)
            let allQuizIds = Array.from(document.querySelectorAll("input[type='radio']"))
                .map(el => parseInt(el.name.replace("jawaban", "")))
                .filter((value, index, self) => self.indexOf(value) === index); // Unik ID

            // Iterasi semua radio button yang dipilih
            document.querySelectorAll("input[type='radio']:checked").forEach((el) => {
                let quiz_id = parseInt(el.name.replace("jawaban", ""));
                let pilihan = el.value;

                // Cek apakah ada file yang diupload
                let fileInput = document.querySelector(`input[name='upload_jawaban_${quiz_id}']`);
                let file_upload = fileInput && fileInput.files.length > 0;

                let jawabanItem = {
                    quiz_id: quiz_id,
                    pilihan: pilihan,
                    file: null
                };

                // Jika ada file, baca sebagai Data URL
                if (file_upload) {
                    let file = fileInput.files[0];
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

            // Tambahkan jawaban default jika tidak dijawab
            allQuizIds.forEach(quiz_id => {
                if (!jawaban.some(j => j.quiz_id === quiz_id)) {
                    jawaban.push({
                        quiz_id: quiz_id,
                        pilihan: "z",
                        file: null
                    });
                }
            });

            // Tunggu semua file dibaca
            Promise.all(fileReadPromises).then(() => {
                // Buat objek data untuk dikirim
                let data = {
                    materi_id: 'semuaMateri',
                    jawaban: jawaban
                };

                // console.log("Data yang dikirim (Object):", data);
                // console.log("Data yang dikirim (JSON String):", JSON.stringify(data));

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
                        hideLoadingOverlay(function() {

                        })
                        closeModal("my_modal_1");

                        let skor = response.skor;
                        let isLastMateri = response.isLastMateri;

                        document.getElementById("skor").innerText = skor;

                        let gifEl = document.getElementById("result-gif");
                        let soundEl = document.getElementById("result-sound");

                        if (isTimeUp && skor < kkm) {
                            document.getElementById("modal-message").innerText =
                                "Waktu Habis! Skor Anda: " + skor + ". Silakan lanjutkan.";

                            gifEl.src = "{{ asset('dist/assets/img/gagal.gif') }}";
                            gifEl.classList.remove("hidden");
                            soundEl.src = "{{ asset('dist/assets/img/gagal.mp3') }}";
                            soundEl.play();
                        } else if (isTimeUp && skor >= kkm) {
                            document.getElementById("modal-message").innerText =
                                "Waktu Habis! Selamat Anda Lulus, Silahkan Lihat Leaderboard";
                             // Set GIF & Sound untuk berhasil
                            gifEl.src = "{{ asset('dist/assets/img/berhasil.gif')}}";
                            gifEl.classList.remove("hidden");
                            soundEl.src = "{{ asset('dist/assets/img/berhasil.mp3') }}";
                            soundEl.play();
                        } else if (skor >= kkm) {
                            document.getElementById("modal-message").innerText =
                                "Selamat Anda Lulus, Silahkan Lihat Leaderboard";
                             // Set GIF & Sound untuk berhasil
                            gifEl.src = "{{ asset('dist/assets/img/berhasil.gif')}}";
                            gifEl.classList.remove("hidden");
                            soundEl.src = "{{ asset('dist/assets/img/berhasil.mp3') }}";
                            soundEl.play();
                        } else {
                            document.getElementById("modal-message").innerText =
                                "Maaf nilai Anda Tidak Mencapai KKM, Jika Sudah Pernah Menyelesaikan Quiz Dan Nilai Diatas KKM maka Yang Disimpan Nilai Dan Jawaban Lama";

                            gifEl.src = "{{ asset('dist/assets/img/gagal.gif') }}";
                            gifEl.classList.remove("hidden");
                            soundEl.src = "{{ asset('dist/assets/img/gagal.mp3') }}";
                            soundEl.play();
                        }

                        let nextUrl = "{{ route('index.leaderboard') }}";
                        document.getElementById("lanjut-btn").href = nextUrl;

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

        function initQuizCountdown() {
            // Timer variables
            let timer;
            let duration;
            let isTimeUp = false;

            const countdownElement = document.getElementById("countdown-timer");
            const quizTabButton = document.getElementById("quizall-styled-tab");
            const quizTabContent = document.getElementById("styled-quizall");

            // Tab materi lainnya
            const materiTabs = document.querySelectorAll("[id^='materi'][id$='-styled-tab']");

             // Ambil waktu dari Blade (batas waktu total)
            let waktu = batas_waktu;
            let parts = waktu.split(":").map(Number);
            let totalDuration = parts.length === 3 ? (parts[0] * 3600 + parts[1] * 60 + parts[2])
                : parts.length === 2 ? (parts[0] * 60 + parts[1])
                : parseInt(waktu);
            if (isNaN(totalDuration) || totalDuration <= 0) totalDuration = 10;

            function disableMateriTabs() {
                materiTabs.forEach(tab => {
                    tab.classList.add("opacity-50", "cursor-not-allowed");
                    tab.setAttribute("disabled", "disabled");
                    tab.setAttribute("title", "Tidak dapat diakses selama quiz berlangsung");
                });
            }

            function enableMateriTabs() {
                materiTabs.forEach(tab => {
                    tab.classList.remove("opacity-50", "cursor-not-allowed");
                    tab.removeAttribute("disabled");
                    tab.removeAttribute("title");
                });
            }

            function startCountdown() {
                if (timer) clearInterval(timer);
                isTimeUp = false;

                let startTime = localStorage.getItem("quizStartTime");
                if (!startTime) {
                    // simpan waktu mulai (detik)
                    localStorage.setItem("quizStartTime", Date.now());
                    startTime = localStorage.getItem("quizStartTime");
                }

                timer = setInterval(() => {
                    let elapsed = Math.floor((Date.now() - parseInt(startTime)) / 1000);
                    duration = totalDuration - elapsed;

                    if (duration <= 0) {
                        clearInterval(timer);
                        isTimeUp = true;
                        countdownElement.textContent = "Waktu Habis!";
                        localStorage.removeItem("quizStartTime");

                        // Disable quiz tab button
                        quizTabButton.classList.add("opacity-50", "cursor-not-allowed");
                        quizTabButton.setAttribute("disabled", "disabled");
                        quizTabButton.setAttribute("title", "Quiz sudah selesai");

                        // Enable materi kembali
                        enableMateriTabs();

                        // Auto submit quiz
                        submitQuiz();
                        return;
                    }

                    const minutes = Math.floor(duration / 60);
                    const seconds = duration % 60;
                    countdownElement.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
                }, 1000);
            }

             // Event klik tab quiz
            quizTabButton.addEventListener("click", function () {
                if (!localStorage.getItem("quizStartTime")) {
                    localStorage.setItem("quizStartTime", Date.now());
                }
                startCountdown();
                disableMateriTabs();
            });

            // 🚀 Saat refresh, kalau quizStartTime ada → langsung lanjut countdown
            if (localStorage.getItem("quizStartTime")) {
                // otomatis pindah ke tab quiz
                quizTabButton.click();
            }
        }

        // Initialize countdown ketika DOM siap
        document.addEventListener("DOMContentLoaded", function() {
            initQuizCountdown();
        });
    </script>

    {{-- tab disabled --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabButtons = document.querySelectorAll("[role='tab']");

            tabButtons.forEach(btn => {
                btn.addEventListener("click", () => {
                    if (!btn.disabled) {
                        fetch("{{ route('save.last.tab') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({ tab: btn.id.includes("quizall") ? "quizall" : btn.id })
                        });
                    }
                });
            });
        });
    </script>


@endsection
