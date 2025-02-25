<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebook | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('dist/assets/img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('dist/assets/scss/iziToast.min.css') }}">
    <script src="{{ asset('dist/assets/js/iziToast.min.js') }}"></script>
</head>

<body class="bg-[#F3F3F3]">
    <div class="h-full shadow-xl">

        {{-- Navbar --}}
        @include('user.layouts.navbar')

        {{-- Banner --}}
        <section class="relative overflow-hidden min-h-[650px]">
            <img src="{{ $settings ? asset('dist/assets/img/cover/'.$settings->cover) : '' }}" alt="" class="absolute inset-0 w-full h-full lg:h-screen object-cover z-10">
            <div class="absolute inset-0 bg-black bg-opacity-30 z-20"></div>
            <div class="relative z-30 flex flex-col items-center justify-center h-full text-white text-center min-h-[650px]">
                <h1 class="text-4xl lg:text-6xl font-bold drop-shadow-lg" data-aos="fade-up" data-aos-duration="1000">{{$settings->judul??''}}</h1>
                <p class="mt-1" data-aos="fade-down" data-aos-duration="1200">{{$settings->deskripsi??''}}</p>
            </div>
        </section>
    </div>

    <main class="container mx-auto mb-20">
        @if ($page == 'Materi1' || $page == 'Materi2' || $page == 'Materi3' || $page == 'Quizall')
            <section class="mt-12">
                <div class="flex flex-wrap gap-2 justify-center text-slate-800 text-sm">
                    <a href="{{ route('index') }}" class="{{ $page == 'Materi1' ? 'bg-sky-500 text-white' : 'bg-slate-300' }} hover:bg-sky-500 hover:text-white shadow px-4 py-2 transition-all duration-300 ease-in-out hover:scale-110 rounded-2xl"><i class="fas fa-book"></i>&nbsp;&nbsp;Materi 1</a>
                    <a href="{{ route('materi2') }}" class="{{ $page == 'Materi2' ? 'bg-sky-500 text-white' : 'bg-slate-300' }} hover:bg-sky-500 hover:text-white shadow px-4 py-2 transition-all duration-300 ease-in-out hover:scale-110 rounded-2xl"><i class="fas fa-book"></i>&nbsp;&nbsp;Materi 2</a>
                    <a href="{{ route('materi3') }}" class="{{ $page == 'Materi3' ? 'bg-sky-500 text-white' : 'bg-slate-300' }} hover:bg-sky-500 hover:text-white shadow px-4 py-2 transition-all duration-300 ease-in-out hover:scale-110 rounded-2xl"><i class="fas fa-book"></i>&nbsp;&nbsp;Materi 3</a>
                    <a href="{{ route('quiz.all') }}" class="{{ $page == 'Quizall' ? 'bg-sky-500 text-white' : 'bg-slate-300' }} hover:bg-sky-500 hover:text-white shadow px-4 py-2 transition-all duration-300 ease-in-out hover:scale-110 rounded-2xl"><i class="fas fa-book"></i>&nbsp;&nbsp;Quiz Seluruh Materi</a>
                </div>
            </section>
        @endif

        <section class="mt-12">
            @yield('content')
        </section>
    </main>

    @include('user.layouts.footer')

    @include('user.layouts.jsfoot')
</body>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach

@endif
@if (session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

@if (session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

</html>
