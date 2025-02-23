<div class="container mx-auto fixed left-0 right-0 z-50 pt-12 flex justify-center px-3">
    <div id="navbarDesktop"
    class="bg-black backdrop-filter backdrop-blur-sm bg-opacity-10 text-sm rounded-xl shadow-xl sm:mx-12 px-5 py-2 inline-flex w-full sm:w-auto"
    >
        <div class="flex justify-between gap-32 p-4 2xl:py-2 w-full sm:w-auto">
            <img
            src="{{ asset('dist/assets/img/logo.png') }}"
            alt="Logo"
            class="h-8 drop-shadow-img"
            />

            <div class="hidden sm:flex gap-8 items-center">
                <a href="{{ route('index') }}">
                    <div class="flex gap-2 items-center {{ $page == 'Materi1' || $page == 'Materi2' || $page == 'Materi3' ? 'text-sky-300' : 'text-white' }} hover:text-sky-300 transition duration-200 transform">
                        <i class="fas fa-book"></i>
                        <p class="font-bold">Materi</p>
                    </div>
                </a>
                <a href="{{ route('index.leaderboard') }}">
                    <div class="flex gap-2 items-center {{ $page == 'Leaderboard' ? 'text-sky-300' : 'text-white' }} hover:text-sky-300 transition duration-200">
                        <i class="fas fa-trophy"></i>
                        <p class="font-bold">Leaderboard</p>
                    </div>
                </a>
            </div>

            @auth
                <div class="relative hidden sm:flex">
                    <button id="dropdownButton" class="bg-sky-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-sky-600 transition duration-200 flex items-center gap-2">
                        <i class="fas fa-user"></i>
                        {{ Auth::user()->name }}
                        <i class="fas fa-chevron-down"></i>
                    </button>

                    <div id="dropdownMenu" class="absolute right-0 mt-9 w-48 bg-white rounded-lg shadow-lg hidden">
                        @if (Auth::user()->role == 'Admin')
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('index.my.history') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg">
                                <i class="fas fa-chart-line"></i> History Nilai Saya
                            </a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg" onclick="openModal('logout')">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            @else
                {{-- Jika user belum login, tampilkan tombol login --}}
                <a href="{{ route('login') }}" class="hidden sm:flex">
                    <button class="bg-sky-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-sky-600 transition duration-200 flex items-center gap-2">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </button>
                </a>
            @endauth


            {{-- Hamburger Menu --}}
            <div class="sm:hidden flex">
                <button id="hamburger">
                    <i class="fa-solid fa-bars text-white text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="navbarMobile" class="hidden sm:hidden fixed top-0 left-0 h-screen w-full bg-gray-500 backdrop-filter backdrop-blur-sm bg-opacity-10 transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="p-4">
            <div class="flex justify-between items-center">
                <img src="{{ asset('dist/assets/img/logo.png') }}" alt="Logo" class="h-8 drop-shadow-img" />
                <!-- Tombol Close -->
                <button id="closeMenu">
                    <i class="fa-solid fa-xmark text-white text-4xl"></i>
                </button>
            </div>
            <ul class="text-white p-5">
                <li class="mb-5">
                    <a href="{{ route('index') }}">
                        <div class="flex gap-2 items-center hover:text-sky-300 transition duration-200 transform">
                            <i class="fas fa-book"></i>
                            <p class="font-bold">Materi</p>
                        </div>
                    </a>
                </li>
                <li class="mb-5">
                    <a href="{{ route('index.leaderboard') }}">
                        <div class="flex gap-2 items-center hover:text-sky-300 transition duration-200">
                            <i class="fas fa-trophy"></i>
                            <p class="font-bold">Leaderboard</p>
                        </div>
                    </a>
                </li>
                <li>
                    @auth
                        <div class="relative flex sm:hidden">
                            <button id="dropdownButtonMobile" class="bg-sky-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-sky-600 transition duration-200 flex items-center gap-2">
                                <i class="fas fa-user"></i>
                                {{ Auth::user()->name }}
                                <i class="fas fa-chevron-down"></i>
                            </button>

                            <div id="dropdownMenuMobile" class="absolute left-0 mt-9 w-48 bg-white rounded-lg shadow-lg hidden">
                                @if (Auth::user()->role == 'Admin')
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('index.my.history') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg">
                                        <i class="fas fa-chart-line"></i> History Nilai Saya
                                    </a>
                                @endif
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg">
                                    <i class="fas fa-user-circle"></i> Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-150 rounded-lg" onclick="openModal('logout')">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </div>
                    @else
                        {{-- Jika user belum login, tampilkan tombol login --}}
                        <a href="{{ route('login') }}" class="flex sm:hidden">
                            <button class="bg-sky-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-sky-600 transition duration-200 flex items-center gap-2">
                                <i class="fas fa-sign-in-alt"></i>
                                Login
                            </button>
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="logout" class="modal">
    <div class="modal-box bg-white text-slate-800">
        <h3 class="text-lg font-bold">Logout?</h3>
        <img src="{{ asset('dist/assets/img/around-the-world.gif') }}" alt="" class="w-36 mx-auto">
        <p class="text-center">Yakin ingin logout?</p>
        <div class="modal-action">
            <a href="{{ route('logout') }}" class="bg-sky-500 text-white px-5 py-2 rounded-lg shadow-md hover:bg-sky-600 transition-all duration-300"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Dropdown Desktop
        const dropdownButton = document.getElementById("dropdownButton");
        const dropdownMenu = document.getElementById("dropdownMenu");

        if (dropdownButton && dropdownMenu) {
            dropdownButton.addEventListener("click", function () {
                dropdownMenu.classList.toggle("hidden");
            });
        }

        // Dropdown Mobile
        const dropdownButtonMobile = document.getElementById("dropdownButtonMobile");
        const dropdownMenuMobile = document.getElementById("dropdownMenuMobile");

        if (dropdownButtonMobile && dropdownMenuMobile) {
            dropdownButtonMobile.addEventListener("click", function () {
                dropdownMenuMobile.classList.toggle("hidden");
            });
        }

        // Click outside to close both dropdowns
        document.addEventListener("click", function (event) {
            if (dropdownButton && dropdownMenu && !dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
            if (dropdownButtonMobile && dropdownMenuMobile && !dropdownButtonMobile.contains(event.target) && !dropdownMenuMobile.contains(event.target)) {
                dropdownMenuMobile.classList.add("hidden");
            }
        });
    });
</script>

{{-- js modal --}}
<script>
    function openModal(id) {
        document.getElementById(id).classList.add("modal-open");
    }

    function closeAndOpenModal() {
        document.getElementById("logout").classList.remove("modal-open"); // Tutup modal pertama
        setTimeout(() => {
            document.getElementById("my_modal_2").classList.add("modal-open"); // Buka modal kedua
        }, 300); // Delay biar smooth
    }
</script>

<script>
    document.getElementById("hamburger").addEventListener("click", function () {
        let navbarMobile = document.getElementById("navbarMobile");
        let navbarDesktop = document.getElementById("navbarDesktop");
        let closeMenu = document.getElementById("closeMenu");
        let hamburger = document.getElementById("hamburger");

        // Tampilkan navbar mobile & tombol close
        navbarMobile.classList.remove("hidden");
        // Tambahkan setTimeout untuk memastikan transisi berjalan setelah element ditampilkan
        setTimeout(() => {
            navbarMobile.classList.remove("translate-x-full");
        }, 10);

        closeMenu.classList.remove("hidden");

        // Sembunyikan navbar desktop & tombol hamburger
        navbarDesktop.classList.add("hidden");
        hamburger.classList.add("hidden");
    });

    document.getElementById("closeMenu").addEventListener("click", function () {
        let navbarMobile = document.getElementById("navbarMobile");
        let navbarDesktop = document.getElementById("navbarDesktop");
        let closeMenu = document.getElementById("closeMenu");
        let hamburger = document.getElementById("hamburger");

        // Tambahkan kembali translate-x-full untuk animasi menutup
        navbarMobile.classList.add("translate-x-full");

        // Tunggu animasi selesai baru sembunyikan element
        setTimeout(() => {
            navbarMobile.classList.add("hidden");
            closeMenu.classList.add("hidden");
        }, 300); // Sesuaikan dengan duration animasi di CSS (300ms)

        // Tampilkan navbar desktop & tombol hamburger
        navbarDesktop.classList.remove("hidden");
        hamburger.classList.remove("hidden");
    });
</script>
