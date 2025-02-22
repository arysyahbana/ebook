<div class="container mx-auto fixed left-0 right-0 z-50 pt-12 flex justify-center">
    <div
    class="bg-black backdrop-filter backdrop-blur-sm bg-opacity-10 text-sm rounded-xl shadow-xl sm:mx-12 px-5 py-2 inline-flex"
    >
        <div class="flex justify-between gap-32 p-4 2xl:py-2">
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
                <div class="relative">
                    <button id="dropdownButton" class="bg-sky-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-sky-600 transition duration-200 flex items-center gap-2">
                        <i class="fas fa-user"></i>
                        {{ Auth::user()->name }}
                        <i class="fas fa-chevron-down"></i>
                    </button>

                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
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
                <a href="{{ route('login') }}">
                    <button class="bg-sky-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-sky-600 transition duration-200 flex items-center gap-2">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </button>
                </a>
            @endauth


            {{-- Hamburger Menu --}}
            {{-- <div class={`sm:hidden ${isOpen ? "hidden" : "flex"}`}>
            <button class="" onClick={handleOpen}>
                <GiHamburgerMenu class="text-white w-8" />
            </button>
            </div> --}}
        </div>

        {{-- Mobile Menu --}}
        {{-- <div
            class={`block sm:hidden fixed top-0 left-0 h-full w-full bg-gray-500 backdrop-filter backdrop-blur-sm bg-opacity-10 transform ${
            isOpen ? "translate-x-0" : "translate-x-full"
            } transition-transform duration-300 ease-in-out z-50`}
        >
            <div class="p-4">
            <div class="flex justify-between items-center">
                <img src="/images/Logo2.png" alt="Logo" class="h-8" />
                <div class="flex">
                <button class="" onClick={handleOpen}>
                    <RxCross2 class="text-white w-10" />
                </button>
                </div>
            </div>
            <ul class="text-white p-5 text-center">
                <li class="mb-3">
                <div class="flex gap-1 justify-center items-center text-white hover:text-sky-300 transition duration-200 transform">
                    <div class="">
                    <IoHome />
                    </div>
                    <p class="font-bold">Home</p>
                </div>
                </li>
                <li class="mb-3">
                <div class="flex gap-1 justify-center items-center text-white hover:text-sky-500 transition duration-200">
                    <div class="text-md">
                    <BsFillPersonFill />
                    </div>
                    <p class="font-bold">About</p>
                </div>
                </li>
                <li class="mb-3">
                <div class="flex gap-1 justify-center items-center text-white hover:text-sky-500 transition duration-300">
                    <div class="text-md">
                    <MdMiscellaneousServices />
                    </div>
                    <p class="font-bold">Services</p>
                </div>
                </li>
                <div class="flex gap-1 justify-center items-center text-white hover:text-sky-500 transition duration-300">
                <div class="text-md">
                    <GrProjects />
                </div>
                <p class="font-bold">Projects</p>
                </div>
            </ul>
            {/* Contact Button */}
            <div class="flex gap-2 justify-center sm:hidden">
                <button class="text-white bg-gradient-to-r from-violet-500 to-sky-500 hover:from-sky-500 hover:to-violet-500 transition duration-200 hover:scale-105 px-5 py-2 rounded-lg">
                <div class="flex gap-1 items-center">
                    <span>
                    <MdContacts />
                    </span>
                    <Link href="/#contact">Contact</Link>
                </div>
                </button>
            </div>
            </div>
        </div> --}}
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
        const dropdownButton = document.getElementById("dropdownButton");
        const dropdownMenu = document.getElementById("dropdownMenu");

        dropdownButton.addEventListener("click", function () {
            dropdownMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
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
