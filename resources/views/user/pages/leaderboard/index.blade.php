@extends('user.layouts.app')
@section('title', 'Leaderboard')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
        {{-- gold --}}
        @foreach ($leaderBoards as $leaderBoard)
                @php
                    $bgColor = 'bg-gradient-to-b from-sky-500';

                    if ($loop->index === 0) {
                        $bgColor = 'bg-gradient-to-b from-amber-500 to-yellow-300'; // Peringkat 1
                    } elseif ($loop->index === 1) {
                        $bgColor = 'bg-gradient-to-b from-gray-300 to-gray-400'; // Peringkat 2
                    } elseif ($loop->index === 2) {
                        $bgColor = 'bg-gradient-to-b from-amber-700 to-orange-900'; // Peringkat 3
                    }
                @endphp
                <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up"
                    data-aos-duration="1500">
                    <div class="flex justify-between">
                        <div class="min-h-full w-full">
                            <div class="flex lg:items-center">
                                <div class="bg-[#F3F3F3] flex w-[10%] pb-2 lg:pb-4">
                                    <div class="{{ $bgColor }} shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg"
                                        data-aos="zoom-in" data-aos-duration="1700">
                                        <img src="{{ asset('dist/assets/img/cupwhite.svg') }}" alt="" class="lg:w-16">
                                    </div>
                                </div>
                                <div class="flex justify-between w-full items-center pt-5 lg:pt-0">
                                    <div class="flex flex-col">
                                        <p class="text-3xl font-semibold text-slate-600 px-12">{{$leaderBoard->nama_user}}</p>
                                        <p class="text-lg px-12 mt-1">{{$leaderBoard->nim}}</p>
                                    </div>
                                    <div class="mx-12 bg-gradient-to-b from-teal-500 to-green-400 shadow-xl rounded-full">
                                        <p class="text-white p-5 text-3xl font-semibold">{{App\Helpers\GlobalFunction::pembulatan($leaderBoard->rata)}}</p>
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
                                                @foreach ($leaderBoard->hasilQuiz as $hasilQuiz)
                                                    <tr>
                                                        <th>{{$loop->iteration}}</th>
                                                        <td>{{$hasilQuiz->nama_materi ?? ''}}</td>
                                                        <td>{{ $hasilQuiz->nilai ?? '' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                        <div class="{{ $bgColor }} shadow-xl min-h-full min-w-6 border rounded-e-lg">
                        </div>
                    </div>
                </div>

        @endforeach
    </div>
@endsection