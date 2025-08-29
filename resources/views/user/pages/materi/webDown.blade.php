<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Sedang Maintenance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 flex items-center justify-center p-4 overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-4 -left-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"></div>
        <div class="absolute -bottom-8 -right-4 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-pulse-slow animation-delay-4000"></div>
    </div>

    <!-- Floating particles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-white rounded-full opacity-30 animate-float animation-delay-1000"></div>
        <div class="absolute top-1/3 right-1/4 w-1 h-1 bg-blue-300 rounded-full opacity-40 animate-float animation-delay-3000"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 bg-purple-300 rounded-full opacity-35 animate-float animation-delay-2000"></div>
        <div class="absolute top-2/3 right-1/3 w-1 h-1 bg-indigo-300 rounded-full opacity-45 animate-float animation-delay-4000"></div>
    </div>

    <!-- Main content -->
    <div class="relative z-10 text-center max-w-xl lg:max-w-2xl mx-auto px-4">
        <!-- Logo/Icon container -->
        <div class="mb-6 lg:mb-8 animate-float">
            <div class="mx-auto w-16 h-16 lg:w-20 lg:h-20 xl:w-24 xl:h-24 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-2xl">
                <svg class="w-8 h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18 21l3-3m-5.196-5.196L21 18l-3 3"></path>
                </svg>
            </div>
        </div>

        <!-- Main heading -->
        <h1 class="text-2xl lg:text-4xl xl:text-5xl 2xl:text-6xl font-bold text-white mb-3 lg:mb-4 tracking-tight">
            <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                Quiz Platform
            </span>
        </h1>

        <!-- Status message -->
        <div class="mb-6 lg:mb-8 p-4 lg:p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 shadow-xl">
            <div class="flex items-center justify-center mb-3 lg:mb-4">
                <div class="w-3 h-3 bg-red-400 rounded-full mr-3 animate-pulse"></div>
                <h2 class="text-lg lg:text-xl xl:text-2xl font-semibold text-white">Akses Tidak Diizinkan</h2>
            </div>
            <p class="text-gray-300 text-sm lg:text-base xl:text-lg leading-relaxed">
                Platform quiz saat ini tidak diaktifkan untuk akses umum. 
                Silakan hubungi administrator untuk informasi lebih lanjut.
            </p>
        </div>

        <!-- Status info -->
        <div class="mb-6 lg:mb-8 flex items-center justify-center space-x-4 text-gray-400">
            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            <span class="text-xs lg:text-sm xl:text-base">Platform dalam status non-aktif</span>
        </div>

        <!-- Admin login section -->
        <div class="bg-gradient-to-r from-gray-800/50 to-gray-900/50 backdrop-blur-md rounded-2xl p-4 lg:p-6 border border-gray-700/50 shadow-xl">
            <div class="flex items-center justify-center mb-3 lg:mb-4">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                <span class="text-gray-400 text-xs lg:text-sm font-medium">Area Admin</span>
            </div>
            
            <button 
                onclick="handleAdminLogin()"
                class="group relative w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-2.5 lg:py-3 px-4 lg:px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/50"
            >
                <span class="relative z-10 flex items-center justify-center">
                    <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="text-sm lg:text-base">Login Admin</span>
                </span>
                <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
            </button>
            
            <p class="text-xs text-gray-500 mt-2 lg:mt-3 text-center">
                Khusus untuk administrator sistem
            </p>
        </div>

        <!-- Footer info -->
        <div class="mt-6 lg:mt-8 text-center text-gray-400 text-xs lg:text-sm">
            <p>© 2025 Quiz Platform. Semua hak dilindungi undang-undang.</p>
        </div>
    </div>

    <script>
        function handleAdminLogin() {
            // Simulasi redirect ke halaman login admin
            // Ganti dengan URL login admin yang sebenarnya
            const adminLoginUrl = '{{ route('login') }}';
            
            // Tambahkan efek loading sebelum redirect
            const button = event.target.closest('button');
            const originalContent = button.innerHTML;
            
            button.innerHTML = `
                <span class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Mengarahkan...
                </span>
            `;
            
            button.disabled = true;
            
            // Simulasi loading dan redirect
            setTimeout(() => {
                window.location.href = adminLoginUrl;
                
                // Reset button
                button.innerHTML = originalContent;
                button.disabled = false;
            }, 1500);
        }

        // Animasi loading dots
        function animateLoadingDots() {
            const dots = document.querySelectorAll('.loading-dot');
            dots.forEach((dot, index) => {
                setTimeout(() => {
                    dot.style.animationDelay = `${index * 0.2}s`;
                }, index * 100);
            });
        }

        // Jalankan animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', animateLoadingDots);
    </script>
</body>
</html>