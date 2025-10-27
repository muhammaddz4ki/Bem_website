<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website resmi BEM Politeknik Manufaktur Bandung - Informasi kegiatan, berita, dan program kerja mahasiswa">
    <meta name="keywords" content="BEM, Politeknik Manufaktur Bandung, POLMAN, Mahasiswa, Organisasi, Berita Kampus">
    <meta name="author" content="BEM Politeknik Manufaktur Bandung">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'BEM Politeknik Manufaktur Bandung' }}">
    <meta property="og:description" content="Website resmi BEM Politeknik Manufaktur Bandung">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'BEM Politeknik Manufaktur Bandung' }}">

    <title>{{ $title ?? 'BEM Politeknik Manufaktur Bandung' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Enhanced Theme Variables */
        :root {
            --primary-light: #1e40af;
            --primary-dark: #3b82f6;
            --bg-light: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #f1f5f9 100%);
            --bg-dark: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #1e293b 100%);
            --text-light: #1e293b;
            --text-dark: #f1f5f9;
            --card-light: #ffffff;
            --card-dark: #1e293b;
            --border-light: #e2e8f0;
            --border-dark: #334155;
            --shadow-light: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-dark: 0 4px 20px rgba(0, 0, 0, 0.3);
            --transition-theme: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-shadow {
            box-shadow: 0 2px 15px rgba(37, 99, 235, 0.1);
        }

        .dark .nav-shadow {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
        }

        .dark .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%);
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }

        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .dark ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }

        /* Enhanced transitions for theme switching */
        * {
            transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease, box-shadow 0.5s ease;
        }

        /* Theme toggle animation */
        .theme-toggle {
            position: relative;
            overflow: hidden;
        }

        .theme-toggle::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #3b82f6, #60a5fa);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 50%;
        }

        .theme-toggle:hover::before {
            opacity: 0.1;
        }

        /* Language toggle animation */
        .lang-toggle {
            position: relative;
            overflow: hidden;
        }

        .lang-toggle::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #10b981, #34d399);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 50%;
        }

        .lang-toggle:hover::before {
            opacity: 0.1;
        }

        /* Enhanced button styles */
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .dark .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1e3a8a);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid #3b82f6;
            color: #3b82f6;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        .dark .btn-secondary {
            border-color: #60a5fa;
            color: #60a5fa;
        }

        .dark .btn-secondary:hover {
            background: #60a5fa;
            color: #1e293b;
        }

        /* Enhanced card styles */
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
            border: 1px solid var(--border-light);
        }

        .dark .card {
            background: var(--card-dark);
            box-shadow: var(--shadow-dark);
            border: 1px solid var(--border-dark);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .dark .card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        /* Enhanced text contrast */
        .text-primary {
            color: var(--text-light);
        }

        .dark .text-primary {
            color: var(--text-dark);
        }

        .text-secondary {
            color: #64748b;
        }

        .dark .text-secondary {
            color: #94a3b8;
        }

        /* Enhanced navigation */
        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        /* Enhanced footer */
        .footer-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .footer-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: white;
            transition: width 0.3s ease;
        }

        .footer-link:hover::before {
            width: 100%;
        }

        /* Loading animation for theme transition */
        .theme-transition {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-light);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s ease;
        }

        .dark .theme-transition {
            background: var(--bg-dark);
        }

        .theme-transition.active {
            opacity: 1;
        }

        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .dark .loader {
            border: 5px solid #334155;
            border-top: 5px solid #60a5fa;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50 dark:from-gray-900 dark:via-slate-900 dark:to-gray-900"
      x-data="{
          darkMode: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
          currentLang: localStorage.getItem('language') || 'id',
          isTransitioning: false,

          translations: {
              id: {
                  home: 'Home',
                  news: 'Berita',
                  category: 'Kategori',
                  dashboard: 'Dashboard',
                  login: 'Masuk',
                  register: 'Daftar',
                  aboutUs: 'Tentang Kami',
                  contact: 'Kontak',
                  contactUs: 'Hubungi Kami',
                  quickLinks: 'Tautan Cepat',
                  allRights: 'Hak Cipta Dilindungi',
                  description: 'Badan Eksekutif Mahasiswa Politeknik Manufaktur Bandung - Bersama membangun kampus yang lebih baik.',
                  address: 'Jl. Kanayakan No. 21, Bandung',
                  polmanBandung: 'Politeknik Manufaktur Bandung'
              },
              en: {
                  home: 'Home',
                  news: 'News',
                  category: 'Category',
                  dashboard: 'Dashboard',
                  login: 'Login',
                  register: 'Register',
                  aboutUs: 'About Us',
                  contact: 'Contact',
                  contactUs: 'Contact Us',
                  quickLinks: 'Quick Links',
                  allRights: 'All Rights Reserved',
                  description: 'Student Executive Board of Bandung Manufacturing Polytechnic - Together building a better campus.',
                  address: 'Jl. Kanayakan No. 21, Bandung, Indonesia',
                  polmanBandung: 'Bandung Manufacturing Polytechnic'
              }
          },

          t(key) {
              return this.translations[this.currentLang][key] || key;
          },

          toggleDarkMode() {
              this.isTransitioning = true;
              setTimeout(() => {
                  this.darkMode = !this.darkMode;
                  if (this.darkMode) {
                      document.documentElement.classList.add('dark');
                      localStorage.setItem('theme', 'dark');
                  } else {
                      document.documentElement.classList.remove('dark');
                      localStorage.setItem('theme', 'light');
                  }
                  setTimeout(() => {
                      this.isTransitioning = false;
                  }, 500);
              }, 100);
          },

          toggleLanguage() {
              this.currentLang = this.currentLang === 'id' ? 'en' : 'id';
              localStorage.setItem('language', this.currentLang);
          }
      }"
      x-init="
          if (darkMode) {
              document.documentElement.classList.add('dark');
          }
      ">

    <!-- Theme Transition Overlay -->
    <div class="theme-transition" :class="{ 'active': isTransitioning }">
        <div class="loader"></div>
    </div>

    <!-- Sticky Navigation -->
    <nav class="bg-white dark:bg-gray-800 nav-shadow sticky top-0 z-50 border-b border-blue-100 dark:border-gray-700" x-data="{ open: false, kategoriOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex">
                    <!-- Logo Section -->
                    <div class="flex items-center shrink-0">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 hover-lift">
                            @if ($logoPath)
                                <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo BEM Politeknik Manufaktur Bandung" class="block h-12 w-auto">
                            @else
                                <div class="h-12 w-12 rounded-full gradient-bg flex items-center justify-center">
                                    <span class="text-white font-bold text-xl">BEM</span>
                                </div>
                            @endif
                            <div class="hidden lg:block">
                                <div class="font-bold text-lg text-blue-900 dark:text-blue-100">BEM POLMAN</div>
                                <div class="text-xs text-blue-600 dark:text-blue-400" x-text="t('polmanBandung')"></div>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ml-12 space-x-1">
                        <a href="{{ route('home') }}" class="nav-link px-4 py-2 rounded-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 {{ request()->routeIs('home') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-gray-700 active' : '' }}" x-text="t('home')">
                        </a>

                        <a href="{{ route('berita.index') }}" class="nav-link px-4 py-2 rounded-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 {{ request()->routeIs('berita.index') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-gray-700 active' : '' }}" x-text="t('news')">
                        </a>

                        <!-- Kategori Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="nav-link px-4 py-2 rounded-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 inline-flex items-center {{ request()->routeIs('kategori.*') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-gray-700 active' : '' }}">
                                <span x-text="t('category')"></span>
                                <svg class="ml-1 h-4 w-4 transition-transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute left-0 mt-2 w-56 rounded-xl shadow-xl bg-white dark:bg-gray-800 ring-1 ring-blue-100 dark:ring-gray-700 overflow-hidden"
                                 style="display: none;">
                                <div class="py-2">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('kategori.posts', $category->slug) }}" class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Theme Toggle, Language Toggle, Auth Links -->
                <div class="hidden sm:flex sm:items-center space-x-3">
                    <!-- Language Toggle -->
                    <button @click="toggleLanguage()" class="lang-toggle p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 transition-all relative group" title="Change Language">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap" x-text="currentLang === 'id' ? 'Switch to English' : 'Ganti ke Bahasa Indonesia'"></span>
                    </button>

                    <!-- Dark Mode Toggle -->
                    <button @click="toggleDarkMode()" class="theme-toggle p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 transition-all relative group" title="Toggle Dark Mode">
                        <svg x-show="!darkMode" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <svg x-show="darkMode" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap" x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                    </button>

                    @if (Route::has('login'))
                        <div class="flex items-center space-x-3 ml-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary px-5 py-2 rounded-lg font-semibold text-white transition-all hover-lift" x-text="t('dashboard')">
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-secondary px-5 py-2 rounded-lg font-semibold transition-all" x-text="t('login')">
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-primary px-5 py-2 rounded-lg font-semibold text-white transition-all hover-lift" x-text="t('register')">
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center space-x-2 sm:hidden">
                    <!-- Mobile Language Toggle -->
                    <button @click="toggleLanguage()" class="lang-toggle p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                    </button>

                    <!-- Mobile Dark Mode Toggle -->
                    <button @click="toggleDarkMode()" class="theme-toggle p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700">
                        <svg x-show="!darkMode" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <svg x-show="darkMode" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </button>

                    <button @click="open = ! open" class="p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 transition-all">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-blue-100 dark:border-gray-700">
            <div class="pt-2 pb-3 space-y-1 px-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-lg {{ request()->routeIs('home') ? 'bg-blue-50 dark:bg-gray-700 text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-700 dark:text-gray-200' }} text-base font-medium hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 transition-all" x-text="t('home')">
                </a>
                <a href="{{ route('berita.index') }}" class="block px-4 py-3 rounded-lg {{ request()->routeIs('berita.index') ? 'bg-blue-50 dark:bg-gray-700 text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-700 dark:text-gray-200' }} text-base font-medium hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 transition-all" x-text="t('news')">
                </a>

                <!-- Mobile Kategori Section -->
                <div class="pt-2">
                    <button @click="kategoriOpen = !kategoriOpen" class="w-full flex items-center justify-between px-4 py-3 text-left">
                        <span class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide" x-text="t('category')"></span>
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400 transition-transform" :class="{ 'rotate-180': kategoriOpen }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="kategoriOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="space-y-1 pl-2">
                        @foreach ($categories as $category)
                            <a href="{{ route('kategori.posts', $category->slug) }}" class="block px-4 py-2.5 rounded-lg {{ request()->is('kategori/'.$category->slug) ? 'bg-blue-50 dark:bg-gray-700 text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-600 dark:text-gray-300' }} text-base font-medium hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 transition-all">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Mobile Auth Links -->
            <div class="pt-4 pb-3 border-t border-blue-100 dark:border-gray-700">
                <div class="space-y-1 px-2">
                     @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block px-4 py-3 rounded-lg text-base font-semibold text-white btn-primary text-center" x-text="t('dashboard')">
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-3 rounded-lg text-base font-medium btn-secondary transition-all" x-text="t('login')">
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block px-4 py-3 rounded-lg text-base font-semibold text-white btn-primary text-center" x-text="t('register')">
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="mt-16 gradient-bg text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">BEM POLMAN Bandung</h3>
                    <p class="text-blue-100 text-sm leading-relaxed" x-text="t('description')">
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4" x-text="t('quickLinks')"></h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="footer-link text-blue-100 hover:text-white transition-colors" x-text="t('home')"></a></li>
                        <li><a href="{{ route('berita.index') }}" class="footer-link text-blue-100 hover:text-white transition-colors" x-text="t('news')"></a></li>
                        <li><a href="#" class="footer-link text-blue-100 hover:text-white transition-colors" x-text="t('aboutUs')"></a></li>
                        <li><a href="#" class="footer-link text-blue-100 hover:text-white transition-colors" x-text="t('contact')"></a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4" x-text="t('contactUs')"></h3>
                    <div class="space-y-2 text-sm text-blue-100">
                        <p x-text="t('polmanBandung')"></p>
                        <p x-text="t('address')"></p>
                        <p>Email: bem@polman-bandung.ac.id</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-blue-400/30 text-center">
                <p class="text-blue-100 text-sm">
                    © {{ date('Y') }} BEM Politeknik Manufaktur Bandung. <span x-text="t('allRights')"></span>.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
