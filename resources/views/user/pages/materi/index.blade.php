@extends('user.layouts.app')
@section('title', 'Materi')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
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
@endsection
