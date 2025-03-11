@extends('user.layouts.app')
@section('title', 'Materi')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-sky-500 hover:text-sky-500 border-sky-500" data-tabs-inactive-classes="text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300" role="tablist">
                {{-- materi 1 --}}
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="materi1-styled-tab" data-tabs-target="#styled-materi1" type="button" role="tab" aria-controls="materi1" aria-selected="false"><i class="fas fa-book"></i>&nbsp;&nbsp;Materi 1</button>
                </li>
                {{-- end materi 1 --}}

                {{-- materi 2 --}}
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="materi2-styled-tab" data-tabs-target="#styled-materi2" type="button" role="tab" aria-controls="materi2" aria-selected="false"><i class="fas fa-book"></i>&nbsp;&nbsp;Materi 2</button>
                </li>
                {{-- end materi 2 --}}

                {{-- materi 3 --}}
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="materi3-styled-tab" data-tabs-target="#styled-materi3" type="button" role="tab" aria-controls="materi3" aria-selected="false"><i class="fas fa-book"></i>&nbsp;&nbsp;Materi 3</button>
                </li>
                {{-- end materi 3 --}}

                {{-- quiz all --}}
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="quizall-styled-tab" data-tabs-target="#styled-quizall" type="button" role="tab" aria-controls="quizall" aria-selected="false"><i class="fas fa-book"></i>&nbsp;&nbsp;Quiz Semua Materi</button>
                </li>
                {{-- end quiz all --}}
            </ul>
        </div>

        <div id="default-styled-tab-content">
            {{-- materi 1 --}}
            <div class="hidden p-4 rounded-lg" id="styled-materi1" role="tabpanel" aria-labelledby="materi1-tab">
                <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-duration="1500">
                    <div class="flex justify-between">
                        <div class="min-h-full w-full">
                            <div class="flex items-center">
                                <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                                    <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg" data-aos="zoom-in" data-aos-duration="1700">
                                        <div class="text-3xl md:text-4xl lg:text-6xl font-bold text-white">01</div>
                                    </div>
                                </div>
                                <p class="text-5xl font-semibold text-sky-500 px-12">Vektor ABCD</p>
                            </div>

                            <div class="px-12 pt-5 pb-12">
                                <div class="overflow-hidden h-full w-full rounded-xl mx-auto my-12">
                                    <video class="w-full h-full object-cover" controls>
                                        <source src="{{ asset('dist/assets/img/vid.mp4') }}" type="video/mp4">
                                        Browser Anda tidak mendukung tag video.
                                    </video>
                                </div>

                                <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Dis aliquet parturient nisi tristique ligula fusce aptent. Risus imperdiet lectus auctor auctor placerat iaculis auctor inceptos. Cursus enim parturient eros ante diam maximus sodales parturient finibus. Molestie non gravida aenean non tristique varius amet penatibus. Senectus auctor habitasse morbi euismod, congue pharetra. Urna imperdiet ad vestibulum taciti varius amet fames volutpat. Nec natoque nibh varius fringilla hac bibendum, montes senectus pretium. Blandit aptent rhoncus mi aliquam; cursus condimentum etiam. Efficitur orci varius sodales congue lacinia mauris diam. Proin felis consectetur viverra sodales tortor. Sodales iaculis praesent congue vivamus viverra. Auctor mauris ultrices maximus maecenas; nunc proin adipiscing. Erat montes litora posuere curae metus. Morbi potenti placerat primis habitasse luctus duis. Fames aptent augue proin class parturient quam. Interdum mauris nec morbi neque adipiscing molestie fringilla venenatis et. Leo vel natoque eu molestie eu mus dignissim!
                                    </p>
                                </div>

                                <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Dis aliquet parturient nisi tristique ligula fusce aptent. Risus imperdiet lectus auctor auctor placerat iaculis auctor inceptos. Cursus enim parturient eros ante diam maximus sodales parturient finibus. Molestie non gravida aenean non tristique varius amet penatibus. Senectus auctor habitasse morbi euismod, congue pharetra. Urna imperdiet ad vestibulum taciti varius amet fames volutpat. Nec natoque nibh varius fringilla hac bibendum, montes senectus pretium. Blandit aptent rhoncus mi aliquam; cursus condimentum etiam. Efficitur orci varius sodales congue lacinia mauris diam. Proin felis consectetur viverra sodales tortor. Sodales iaculis praesent congue vivamus viverra. Auctor mauris ultrices maximus maecenas; nunc proin adipiscing. Erat montes litora posuere curae metus. Morbi potenti placerat primis habitasse luctus duis. Fames aptent augue proin class parturient quam. Interdum mauris nec morbi neque adipiscing molestie fringilla venenatis et. Leo vel natoque eu molestie eu mus dignissim!
                                    </p>
                                </div>

                                <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Dis aliquet parturient nisi tristique ligula fusce aptent. Risus imperdiet lectus auctor auctor placerat iaculis auctor inceptos. Cursus enim parturient eros ante diam maximus sodales parturient finibus. Molestie non gravida aenean non tristique varius amet penatibus. Senectus auctor habitasse morbi euismod, congue pharetra. Urna imperdiet ad vestibulum taciti varius amet fames volutpat. Nec natoque nibh varius fringilla hac bibendum, montes senectus pretium. Blandit aptent rhoncus mi aliquam; cursus condimentum etiam. Efficitur orci varius sodales congue lacinia mauris diam. Proin felis consectetur viverra sodales tortor. Sodales iaculis praesent congue vivamus viverra. Auctor mauris ultrices maximus maecenas; nunc proin adipiscing. Erat montes litora posuere curae metus. Morbi potenti placerat primis habitasse luctus duis. Fames aptent augue proin class parturient quam. Interdum mauris nec morbi neque adipiscing molestie fringilla venenatis et. Leo vel natoque eu molestie eu mus dignissim!
                                    </p>
                                </div>

                                <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Dis aliquet parturient nisi tristique ligula fusce aptent. Risus imperdiet lectus auctor auctor placerat iaculis auctor inceptos. Cursus enim parturient eros ante diam maximus sodales parturient finibus. Molestie non gravida aenean non tristique varius amet penatibus. Senectus auctor habitasse morbi euismod, congue pharetra. Urna imperdiet ad vestibulum taciti varius amet fames volutpat. Nec natoque nibh varius fringilla hac bibendum, montes senectus pretium. Blandit aptent rhoncus mi aliquam; cursus condimentum etiam. Efficitur orci varius sodales congue lacinia mauris diam. Proin felis consectetur viverra sodales tortor. Sodales iaculis praesent congue vivamus viverra. Auctor mauris ultrices maximus maecenas; nunc proin adipiscing. Erat montes litora posuere curae metus. Morbi potenti placerat primis habitasse luctus duis. Fames aptent augue proin class parturient quam. Interdum mauris nec morbi neque adipiscing molestie fringilla venenatis et. Leo vel natoque eu molestie eu mus dignissim!
                                    </p>
                                </div>

                                <div class="flex justify-end gap-3 text-sm mt-6">
                                    <a href="{{ route('index.quiz') }}" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 @guest pointer-events-none opacity-50 @endguest">Quiz</a>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                        <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg"></div>
                    </div>
                </div>
            </div>
            {{-- end materi 1 --}}

            {{-- materi 2 --}}
            <div class="hidden p-4 rounded-lg" id="styled-materi2" role="tabpanel" aria-labelledby="materi2-tab">
                <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-duration="1500">
                    <div class="flex justify-between">
                        <div class="min-h-full w-full">
                            <div class="flex items-center">
                                <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                                    <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg" data-aos="zoom-in" data-aos-duration="1700">
                                        <div class="text-3xl md:text-4xl lg:text-6xl font-bold text-white">02</div>
                                    </div>
                                </div>
                                <p class="text-5xl font-semibold text-sky-500 px-12">Vektor BCDE</p>
                            </div>

                            <div class="px-12 pt-5 pb-12">
                                <div class="overflow-hidden h-full w-full rounded-xl mx-auto my-12">
                                    <video class="w-full h-full object-cover" controls>
                                        <source src="{{ asset('dist/assets/img/vid.mp4') }}" type="video/mp4">
                                        Browser Anda tidak mendukung tag video.
                                    </video>
                                </div>

                                <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Dis aliquet parturient nisi tristique ligula fusce aptent. Risus imperdiet lectus auctor auctor placerat iaculis auctor inceptos. Cursus enim parturient eros ante diam maximus sodales parturient finibus. Molestie non gravida aenean non tristique varius amet penatibus. Senectus auctor habitasse morbi euismod, congue pharetra. Urna imperdiet ad vestibulum taciti varius amet fames volutpat. Nec natoque nibh varius fringilla hac bibendum, montes senectus pretium. Blandit aptent rhoncus mi aliquam; cursus condimentum etiam. Efficitur orci varius sodales congue lacinia mauris diam. Proin felis consectetur viverra sodales tortor. Sodales iaculis praesent congue vivamus viverra. Auctor mauris ultrices maximus maecenas; nunc proin adipiscing. Erat montes litora posuere curae metus. Morbi potenti placerat primis habitasse luctus duis. Fames aptent augue proin class parturient quam. Interdum mauris nec morbi neque adipiscing molestie fringilla venenatis et. Leo vel natoque eu molestie eu mus dignissim!
                                    </p>
                                </div>

                                <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Dis aliquet parturient nisi tristique ligula fusce aptent. Risus imperdiet lectus auctor auctor placerat iaculis auctor inceptos. Cursus enim parturient eros ante diam maximus sodales parturient finibus. Molestie non gravida aenean non tristique varius amet penatibus. Senectus auctor habitasse morbi euismod, congue pharetra. Urna imperdiet ad vestibulum taciti varius amet fames volutpat. Nec natoque nibh varius fringilla hac bibendum, montes senectus pretium. Blandit aptent rhoncus mi aliquam; cursus condimentum etiam. Efficitur orci varius sodales congue lacinia mauris diam. Proin felis consectetur viverra sodales tortor. Sodales iaculis praesent congue vivamus viverra. Auctor mauris ultrices maximus maecenas; nunc proin adipiscing. Erat montes litora posuere curae metus. Morbi potenti placerat primis habitasse luctus duis. Fames aptent augue proin class parturient quam. Interdum mauris nec morbi neque adipiscing molestie fringilla venenatis et. Leo vel natoque eu molestie eu mus dignissim!
                                    </p>
                                </div>

                                <div class="flex justify-end gap-3 text-sm mt-6">
                                    <a href="{{ route('index.quiz') }}" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300">Quiz</a>
                                    {{-- <a href="#" class="bg-gray-200 text-sky-500 px-5 py-2 rounded-lg shadow-md hover:bg-gray-300 transition-all duration-300">Quiz</a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                        <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg"></div>
                    </div>
                </div>
            </div>
            {{-- end materi 2 --}}

            {{-- materi 3 --}}
            <div class="hidden p-4 rounded-lg" id="styled-materi3" role="tabpanel" aria-labelledby="materi3-tab">
                <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-duration="1500">
                    <div class="flex justify-between">
                        <div class="min-h-full w-full">
                            <div class="flex items-center">
                                <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                                    <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg" data-aos="zoom-in" data-aos-duration="1700">
                                        <div class="text-3xl md:text-4xl lg:text-6xl font-bold text-white">03</div>
                                    </div>
                                </div>
                                <p class="text-5xl font-semibold text-sky-500 px-12">Vektor CDEF</p>
                            </div>

                            <div class="px-12 pt-5 pb-12">
                                <div class="overflow-hidden h-full w-full rounded-xl mx-auto my-12">
                                    <video class="w-full h-full object-cover" controls>
                                        <source src="{{ asset('dist/assets/img/vid.mp4') }}" type="video/mp4">
                                        Browser Anda tidak mendukung tag video.
                                    </video>
                                </div>

                                <div class="border-l-4 border-sky-500 pl-6 mt-6">
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Lorem ipsum odor amet, consectetuer adipiscing elit. Dis aliquet parturient nisi tristique ligula fusce aptent. Risus imperdiet lectus auctor auctor placerat iaculis auctor inceptos. Cursus enim parturient eros ante diam maximus sodales parturient finibus. Molestie non gravida aenean non tristique varius amet penatibus. Senectus auctor habitasse morbi euismod, congue pharetra. Urna imperdiet ad vestibulum taciti varius amet fames volutpat. Nec natoque nibh varius fringilla hac bibendum, montes senectus pretium. Blandit aptent rhoncus mi aliquam; cursus condimentum etiam. Efficitur orci varius sodales congue lacinia mauris diam. Proin felis consectetur viverra sodales tortor. Sodales iaculis praesent congue vivamus viverra. Auctor mauris ultrices maximus maecenas; nunc proin adipiscing. Erat montes litora posuere curae metus. Morbi potenti placerat primis habitasse luctus duis. Fames aptent augue proin class parturient quam. Interdum mauris nec morbi neque adipiscing molestie fringilla venenatis et. Leo vel natoque eu molestie eu mus dignissim!
                                    </p>
                                </div>

                                <div class="flex justify-end gap-3 text-sm mt-6">
                                    <a href="{{ route('index.quiz') }}" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300">Quiz</a>
                                    {{-- <a href="#" class="bg-gray-200 text-sky-500 px-5 py-2 rounded-lg shadow-md hover:bg-gray-300 transition-all duration-300">Quiz</a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                        <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg"></div>
                    </div>
                </div>
            </div>
            {{-- end materi 3 --}}

            {{-- quiz all --}}
            <div class="hidden p-4 rounded-lg" id="styled-quizall" role="tabpanel" aria-labelledby="quizall-tab">
                <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-duration="1500">
                    <div class="flex justify-between">
                        <div class="min-h-full w-full">
                            <div class="flex items-center">
                                <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                                    <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg" data-aos="zoom-in" data-aos-duration="1700">
                                        <div class="text-3xl md:text-4xl lg:text-6xl font-bold text-white"><i class="fas fa-book"></i></div>
                                    </div>
                                </div>
                                <p class="text-5xl font-semibold text-sky-500 px-12"> Quiz Seluruh Materi</p>
                            </div>

                            <div class="px-4 sm:px-12 pt-5 pb-12 text-slate-800">
                                <div class="border-l-4 border-sky-500 pl-3 sm:pl-6 mt-6 space-y-10">
                                    <!-- Soal 1 -->
                                    <div class="flex flex-col md:flex-row gap-5">
                                        <div class="flex-1">
                                            <div class="flex gap-3">
                                                <div>1.</div>
                                                <div class="flex-1">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                        </div>
                                        <div class="flex items-start">
                                            <label for="fileUpload1" class="bg-orange-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer">
                                                Upload
                                            </label>
                                            <input type="file" id="fileUpload1" class="hidden" name="upload_jawaban_1">
                                        </div>
                                    </div>

                                    <!-- Soal 2 -->
                                    <div class="flex flex-col md:flex-row gap-5">
                                        <div class="flex-1">
                                            <div class="flex gap-3">
                                                <div>2.</div>
                                                <div class="flex-1">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <div class="mt-2">
                                                        <textarea class="textarea textarea-bordered bg-[#F3F3F3] w-full md:w-[90%]" rows="4" name="jawaban_2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <label for="fileUpload2" class="bg-orange-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer">
                                                Upload
                                            </label>
                                            <input type="file" id="fileUpload2" class="hidden" name="upload_jawaban_2">
                                        </div>
                                    </div>

                                    <!-- Soal 3 -->
                                    <div class="flex flex-col md:flex-row gap-5">
                                        <div class="flex-1">
                                            <div class="flex gap-3">
                                                <div>3.</div>
                                                <div class="flex-1">
                                                    <div class="overflow-hidden max-h-[30rem] max-w-[30rem] rounded-xl mb-5">
                                                        <img src="{{ asset('dist/assets/img/banner.jpg') }}" alt="" class="w-full h-full object-cover">
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                        </div>
                                        <div class="flex items-start">
                                            <label for="fileUpload3" class="bg-orange-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 cursor-pointer">
                                                Upload
                                            </label>
                                            <input type="file" id="fileUpload3" class="hidden" name="upload_jawaban_3">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-3 text-sm mt-6">
                                    <a href="#" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300" onclick="openModal('my_modal_1')">Selesai</a>
                                </div>
                            </div>

                        </div>

                        <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                        <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg"></div>
                    </div>
                </div>
            </div>
            {{-- end quiz all --}}

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
                <a href="javascript:void(0);" onclick="switchTab('quizall-styled-tab')" class="bg-red-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all duration-300 text-sm">Ulangi</a>
                <a href="javascript:void(0);" onclick="switchTab('materi1-styled-tab')" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300 text-sm">Lanjutkan</a>
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
