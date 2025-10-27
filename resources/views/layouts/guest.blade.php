<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            .card-shadow {
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.06);
            }
            .floating {
                animation: floating 3s ease-in-out infinite;
            }
            @keyframes floating {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Background dengan gradient dan pattern -->
        <div class="min-h-screen gradient-bg relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-72 h-72 bg-pink-300 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-pulse animation-delay-2000"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-purple-300 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-pulse animation-delay-4000"></div>
            </div>

            <div class="relative z-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                <!-- Logo Section -->
                <div class="floating">
                    <a href="/" class="flex items-center space-x-3 group">
                        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-2xl group-hover:shadow-3xl transition-all duration-300 transform group-hover:scale-110">
                            <x-application-logo class="w-10 h-10 fill-current text-blue-600" />
                        </div>
                        <div class="text-left">
                            <h1 class="text-2xl font-bold text-white">{{ config('app.name', 'Laravel') }}</h1>
                            <p class="text-blue-100 text-sm">BEM Kampus</p>
                        </div>
                    </a>
                </div>

                <!-- Card Container -->
                <div class="w-full sm:max-w-md mt-8 px-6">
                    <div class="bg-white/95 backdrop-blur-lg rounded-3xl card-shadow border border-white/20 overflow-hidden transform hover:scale-105 transition-all duration-300">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-4">
                            <h2 class="text-xl font-bold text-white text-center">
                                @if(request()->routeIs('login'))
                                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Akun
                                @elseif(request()->routeIs('register'))
                                    <i class="fas fa-user-plus mr-2"></i>Daftar Akun Baru
                                @elseif(request()->routeIs('password.request'))
                                    <i class="fas fa-key mr-2"></i>Reset Password
                                @elseif(request()->routeIs('password.reset'))
                                    <i class="fas fa-lock mr-2"></i>Password Baru
                                @elseif(request()->routeIs('verification.notice'))
                                    <i class="fas fa-envelope mr-2"></i>Verifikasi Email
                                @elseif(request()->routeIs('verification.verify'))
                                    <i class="fas fa-check-circle mr-2"></i>Verifikasi
                                @else
                                    <i class="fas fa-user-circle mr-2"></i>Autentikasi
                                @endif
                            </h2>
                        </div>

                        <!-- Card Content -->
                        <div class="px-8 py-6">
                            {{ $slot }}
                        </div>

                        <!-- Card Footer -->
                        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
                            <div class="text-center text-sm text-gray-600">
                                @if(request()->routeIs('login'))
                                    <p>Belum punya akun?
                                        <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                            Daftar di sini
                                        </a>
                                    </p>
                                @elseif(request()->routeIs('register'))
                                    <p>Sudah punya akun?
                                        <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                            Masuk di sini
                                        </a>
                                    </p>
                                @elseif(request()->routeIs('password.request'))
                                    <p>Ingat password?
                                        <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                            Kembali ke login
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-white/80 text-sm">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                    </p>
                </div>
            </div>
        </div>

        <script>
            // Tambahkan animasi delay untuk background elements
            document.addEventListener('DOMContentLoaded', function() {
                const elements = document.querySelectorAll('.animate-pulse');
                elements.forEach((element, index) => {
                    element.style.animationDelay = `${index * 2000}ms`;
                });
            });
        </script>
    </body>
</html>
