@extends('user.layouts.app')
@section('title', 'History')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
        <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-duration="1500">
            <div class="flex justify-between">
                <div class="min-h-full w-full">
                    <div class="flex lg:items-center">
                        <div class="bg-[#F3F3F3] flex w-[10%] pb-2 lg:pb-4">
                            <div class="bg-gradient-to-b from-amber-500 to-yellow-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg" data-aos="zoom-in" data-aos-duration="1700">
                                <img src="{{ asset('dist/assets/img/cupwhite.svg') }}" alt="" class="lg:w-16">
                            </div>
                        </div>
                        <div class="flex justify-between w-full items-center pt-5 lg:pt-0">
                            <div class="flex flex-col">
                                <p class="text-3xl font-semibold text-slate-600 px-12">Ary Syahbana</p>
                                <p class="text-lg px-12 mt-1">20076034</p>
                            </div>
                            <div class="mx-12 bg-gradient-to-b from-teal-500 to-green-400 shadow-xl rounded-full">
                                <p class="text-white p-5 text-3xl font-semibold">90</p>
                            </div>
                        </div>
                    </div>

                    <div class="px-12 pt-5 pb-12">
                        <div class="border-l-4 border-yellow-300 pl-6 mt-6">
                            <div class="overflow-x-auto">
                                <table class="table text-slate-700">
                                    <!-- head -->
                                    <thead class="text-slate-700">
                                    <tr>
                                        <th>Quiz</th>
                                        <th>Materi</th>
                                        <th>Nilai</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Vector ABCD</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Vector BCDE</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Vector CDEF</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>Semua Materi</td>
                                        <td>90</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                <div class="bg-gradient-to-b from-amber-500 to-yellow-300 shadow-xl min-h-full min-w-6 border rounded-e-lg"></div>
            </div>
        </div>
    </div>
@endsection
