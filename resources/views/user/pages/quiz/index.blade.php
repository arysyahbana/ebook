@extends('user.layouts.app')
@section('title', 'Quiz')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
        <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-duration="1500">
            <div class="flex justify-between">
                <div class="min-h-full w-full">
                    <div class="flex items-center">
                        <div class="bg-[#F3F3F3] flex w-[10%] pb-4">
                            <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg" data-aos="zoom-in" data-aos-duration="1700">
                                <div class="text-6xl font-bold text-white">01</div>
                            </div>
                        </div>
                        <p class="text-5xl font-semibold text-sky-500 px-12"> Quiz Vektor ABCD</p>
                    </div>

                    <div class="px-12 pt-5 pb-12 text-slate-800">
                        <div class="border-l-4 border-sky-500 pl-6 mt-6">
                            <table width="100%">
                                {{-- soal 1 --}}
                                <tr>
                                    <td>
                                        <div class="flex gap-3">
                                            <div>1.</div>
                                            <div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="mt-2 space-y-2">
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_1" value="a" class="w-4 h-4 text-blue-500">
                                                        <span>a. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_1" value="b" class="w-4 h-4 text-blue-500">
                                                        <span>b. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_1" value="c" class="w-4 h-4 text-blue-500">
                                                        <span>c. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_1" value="d" class="w-4 h-4 text-blue-500">
                                                        <span>d. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_1" value="e" class="w-4 h-4 text-blue-500">
                                                        <span>e. Lorem</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="flex items-center ps-5 text-sm">
                                        <label for="fileUpload" class="bg-orange-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer">
                                            Upload
                                        </label>
                                        <input type="file" id="fileUpload" class="hidden" name="upload_jawaban_1">
                                    </td>
                                </tr>

                                {{-- soal 2 --}}
                                <tr>
                                    <td class="pt-10">
                                        <div class="flex gap-3">
                                            <div>2.</div>
                                            <div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="mt-2 space-y-2">
                                                    <textarea class="textarea textarea-bordered bg-[#F3F3F3]" rows="4" cols="100" name="jawaban_2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="flex items-center ps-5 text-sm pt-10">
                                        <label for="fileUpload" class="bg-orange-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer">
                                            Upload
                                        </label>
                                        <input type="file" id="fileUpload" class="hidden" name="upload_jawaban_2">
                                    </td>
                                </tr>

                                {{-- soal 3 --}}
                                <tr>
                                    <td class="pt-10">
                                        <div class="flex gap-3">
                                            <div>3.</div>
                                            <div>
                                                <div class="overflow-hidden max-h-[30rem] max-w-[30rem] rounded-xl mb-5">
                                                    <img src="{{ asset('dist/assets/img/banner.jpg') }}" alt="" class="w-full h-full object-cover">
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="mt-2 space-y-2">
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_3" value="a" class="w-4 h-4 text-blue-500">
                                                        <span>a. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_3" value="b" class="w-4 h-4 text-blue-500">
                                                        <span>b. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_3" value="c" class="w-4 h-4 text-blue-500">
                                                        <span>c. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_3" value="d" class="w-4 h-4 text-blue-500">
                                                        <span>d. Lorem</span>
                                                    </label>
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="jawaban_3" value="e" class="w-4 h-4 text-blue-500">
                                                        <span>e. Lorem</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="flex items-center ps-5 text-sm pt-10">
                                        <label for="fileUpload" class="bg-orange-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer">
                                            Upload
                                        </label>
                                        <input type="file" id="fileUpload" class="hidden" name="upload_jawaban_3">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="flex justify-end gap-3 text-sm mt-6">
                            <a href="#" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300" onclick="openModal('my_modal_1')">Selesai</a>
                            {{-- <a href="#" class="bg-gray-200 text-sky-500 px-5 py-2 rounded-lg shadow-md hover:bg-gray-300 transition-all duration-300">Quiz</a> --}}
                        </div>
                    </div>
                </div>

                <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg"></div>
            </div>
        </div>
    </div>

    <!-- Modal Pertama -->
    <div id="my_modal_1" class="modal">
        <div class="modal-box bg-white text-slate-800">
            <h3 class="text-lg font-bold">Akhiri Quiz</h3>
            <img src="{{ asset('dist/assets/img/clock.gif') }}" alt="" class="w-36 mx-auto">
            <p class="text-center">Yakin ingin akhiri quiz?</p>
            <div class="modal-action">
                <button class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300"
                    onclick="closeAndOpenModal()">Yakin</button>
            </div>
        </div>
    </div>

    <!-- Modal Kedua -->
    <div id="my_modal_2" class="modal">
        <div class="modal-box bg-white text-slate-700">
            <h3 class="text-lg text-center mb-8">Selamat Anda Lulus</h3>
            <h1 class="text-center text-8xl font-bold mb-12">90</h1>
            <div class="flex justify-center items-center gap-3">
                <a href="{{ route('index.quiz') }}" class="bg-red-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300 text-sm">Ulangi</a>
                <a href="{{ route('materi2') }}" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 text-sm">Lanjutkan</a>
            </div>
        </div>
    </div>

    {{-- js modal --}}
    <script>
        function openModal(id) {
            document.getElementById(id).classList.add("modal-open");
        }

        function closeAndOpenModal() {
            document.getElementById("my_modal_1").classList.remove("modal-open"); // Tutup modal pertama
            setTimeout(() => {
                document.getElementById("my_modal_2").classList.add("modal-open"); // Buka modal kedua
            }, 300); // Delay biar smooth
        }
    </script>

@endsection
