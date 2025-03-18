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
                            {{ (!auth()->check() || $quizAllCheck->total_mengerjakan >= 1) ? 'opacity-50 cursor-not-allowed' : '' }}"
                            id="quizall-styled-tab"
                            data-tabs-target="#styled-quizall"
                            type="button"
                            role="tab"
                            aria-controls="quizall"
                            aria-selected="false"
                            {{ (!auth()->check() || $quizAllCheck->total_mengerjakan >= 1) ? 'disabled' : '' }}
                            title="{{ !auth()->check() ? 'Login terlebih dahulu' : ($quizAllCheck->total_mengerjakan >= 1 ? 'Sudah pernah mengerjakan quiz ini' : '') }}">
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
                {{-- <a id="ulang-btn" href="#"
                    class="bg-red-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300 text-sm">Ulangi</a> --}}
                <a id="lanjut-btn" href="#"
                    class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 text-sm">Lanjutkan</a>
            </div>
        </div>
    </div>

    <!-- Modal Waktu Habis -->
    {{-- <div id="my_modal_3" class="modal">
        <div class="modal-box bg-white text-slate-700">
            <h3 class="text-lg text-center mb-8">Waktu Ujian Sudah Habis</h3>
            <h1 class="text-center text-8xl font-bold mb-12" id="skor"></h1>
            <div class="flex justify-center items-center gap-3">
                <a href="{{ route('index.leaderboard') }}"
                    class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 text-sm">Lanjutkan</a>
            </div>
        </div>
    </div> --}}

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

        let batas_waktu = "{{ $settings->batas_waktu }}";
        let isTimeUp = false;

        function submitQuiz() {
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
                        closeModal("my_modal_1");

                        let skor = response.skor;
                        let isLastMateri = response.isLastMateri;

                        document.getElementById("skor").innerText = skor;

                        if (isTimeUp && skor < kkm) {
                            document.getElementById("modal-message").innerText =
                                "Waktu Habis! Skor Anda: " + skor + ". Silakan lanjutkan.";
                        } else if (isTimeUp && skor >= kkm) {
                            document.getElementById("modal-message").innerText =
                                "Waktu Habis! Selamat Anda Lulus, Silahkan Lihat Leaderboard";
                        } else if (skor >= kkm) {
                            document.getElementById("modal-message").innerText =
                                "Selamat Anda Lulus, Silahkan Lihat Leaderboard";
                        } else {
                            document.getElementById("modal-message").innerText =
                                "Maaf nilai Anda Tidak Mencapai KKM, Jika Sudah Pernah Menyelesaikan Quiz Dan Nilai Diatas KKM maka Yang Disimpan Nilai Dan Jawaban Lama";
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

            // Tambahkan event listener untuk quiz tab
            quizTabButton.addEventListener("click", function() {
                startCountdown();
                disableMateriTabs(); // Disable tab materi lainnya saat quiz dimulai
            });

            // Start the countdown if the quiz tab is active on load
            if (quizTabContent && !quizTabContent.classList.contains("hidden")) {
                startCountdown();
                disableMateriTabs(); // Disable tab materi lainnya saat quiz dimulai
            }

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

                // Ambil waktu dari Blade
                let waktu = batas_waktu;

                // Parsing waktu
                let parts = waktu.split(":").map(Number);
                duration = parts.length === 3 ? (parts[0] * 3600 + parts[1] * 60 + parts[2])
                        : parts.length === 2 ? (parts[0] * 60 + parts[1])
                        : parseInt(waktu);

                if (isNaN(duration) || duration <= 0) duration = 10;

                // Update countdown pertama kali
                updateCountdown();

                // Update countdown setiap detik
                timer = setInterval(updateCountdown, 1000);
            }

            function updateCountdown() {
                const minutes = Math.floor(duration / 60);
                const seconds = duration % 60;

                countdownElement.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;

                if (duration > 0) {
                    duration--;
                } else {
                    clearInterval(timer);
                    isTimeUp = true;

                    // Disable quiz tab button
                    quizTabButton.classList.add("opacity-50", "cursor-not-allowed");
                    quizTabButton.setAttribute("disabled", "disabled");
                    quizTabButton.setAttribute("title", "Quiz sudah selesai");

                    // Enable kembali tab materi setelah quiz selesai
                    enableMateriTabs();

                    // Panggil fungsi submitQuiz (jika ada)
                    submitQuiz();
                }
            }
        }

        // Initialize countdown ketika DOM siap
        document.addEventListener("DOMContentLoaded", function() {
            initQuizCountdown();
        });
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get necessary elements
            const countdownElement = document.getElementById("countdown-timer");
            const quizTabButton = document.getElementById("quizall-styled-tab");
            const quizTabContent = document.getElementById("styled-quizall");

            let timer; // Timer variable
            let duration; // Duration in seconds

            // Function to handle tab switching
            function handleTabSwitch() {
                const tabButtons = document.querySelectorAll("[data-tabs-target]");

                tabButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        const target = this.getAttribute("data-tabs-target");

                        // Start countdown if the quiz tab is clicked
                        if (target === "#styled-quizall") {
                            startCountdown();
                        }
                    });
                });
            }

            // Function to start the countdown
            function startCountdown() {
                // Clear any existing timer
                if (timer) clearInterval(timer);

                // Get duration from Blade (in HH:MM:SS, MM:SS, or seconds format)
                let waktu = "{{ $settings->batas_waktu }}";
                console.log("Waktu dari Blade:", waktu);

                // Parse duration
                let parts = waktu.split(":").map(Number); // Convert to numbers

                if (parts.length === 3) {
                    // Format HH:MM:SS
                    duration = parts[0] * 3600 + parts[1] * 60 + parts[2];
                } else if (parts.length === 2) {
                    // Format MM:SS
                    duration = parts[0] * 60 + parts[1];
                } else {
                    // Assume seconds only
                    duration = parseInt(waktu);
                }

                // Validate duration
                if (isNaN(duration) || duration <= 0) duration = 10;

                // Update countdown immediately
                updateCountdown();

                // Start the countdown every second
                timer = setInterval(updateCountdown, 1000);
            }

            // Function to update countdown display
            function updateCountdown() {
                const minutes = Math.floor(duration / 60);
                const seconds = duration % 60;

                // Display countdown with proper formatting
                countdownElement.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;

                if (duration > 0) {
                    duration--;
                } else {
                    clearInterval(timer);

                    // Disable quiz tab button
                    quizTabButton.classList.add("opacity-50", "cursor-not-allowed");
                    quizTabButton.setAttribute("disabled", "disabled");
                    quizTabButton.setAttribute("title", "Quiz sudah selesai");

                    // Optionally auto-submit the quiz
                    submitQuiz();
                }
            }

            // Initialize tab switching
            handleTabSwitch();

            // Start countdown if the quiz tab is already active on load
            if (quizTabContent && !quizTabContent.classList.contains("hidden")) {
                startCountdown();
            }
        });
    </script> --}}

@endsection
