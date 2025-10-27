<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tiny.cloud/1/v27lkritlmdifu3mg0ge9p2drrd2o6xufm3axeh6uevemvrs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        /* Styling tambahan untuk sidebar aktif/hover */
        .sidebar-link:hover, .sidebar-link[aria-current="page"] {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .sidebar-link i {
            width: 1.25rem; /* Menyamakan lebar ikon */
            text-align: center;
        }
        /* Pastikan konten tidak tertimpa header sticky */
        main {
             padding-top: 4rem; /* Sesuaikan dengan tinggi header jika perlu */
        }
    </style>
</head>
<body class="font-sans antialiased">
    {{-- Alpine.js state untuk toggle sidebar mobile --}}
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100 dark:bg-gray-900 overflow-hidden"> {{-- Ganti min-h-screen -> h-screen, tambah flex & overflow-hidden --}}

        <aside
            class="fixed inset-y-0 left-0 z-30 w-64 h-screen overflow-y-auto transition-transform duration-300 transform bg-gradient-to-b from-blue-700 to-purple-800 dark:from-gray-800 dark:to-gray-900 shadow-lg lg:translate-x-0 lg:static lg:inset-0 flex-shrink-0" {{-- Tambah flex-shrink-0 --}}
            :class="{'translate-x-0 ease-out': sidebarOpen, '-translate-x-full ease-in': !sidebarOpen}"
        >
            <div class="flex items-center justify-center h-20 px-6 border-b border-white/20 dark:border-gray-700">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                     @if ($logoPath)
                        <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo BEM Kampus" class="block h-10 w-auto rounded-md shadow">
                    @else
                        <div class="block h-10 w-10 bg-white rounded-md flex items-center justify-center shadow">
                             <span class="text-blue-600 font-bold text-base">BEM</span>
                        </div>
                    @endif
                    <span class="text-xl font-bold text-white">Dashboard</span>
                </a>
            </div>

            <nav class="mt-6 px-4 space-y-2">
                {{-- Link Dashboard --}}
                <a href="{{ route('dashboard') }}" aria-current="{{ request()->routeIs('dashboard') ? 'page' : '' }}"
                   class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                {{-- == BLOK SUPERADMIN == --}}
                @can('isSuperAdmin')
                    <a href="{{ route('categories.index') }}" aria-current="{{ request()->routeIs('categories.*') ? 'page' : '' }}"
                       class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                        <i class="fas fa-tags mr-3"></i>
                        <span class="font-medium">Kategori</span>
                    </a>
                    <a href="{{ route('galleries.index') }}" aria-current="{{ request()->routeIs('galleries.*') ? 'page' : '' }}"
                       class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                        <i class="fas fa-images mr-3"></i>
                        <span class="font-medium">Galeri</span>
                    </a>
                     <a href="{{ route('ministries.index') }}" aria-current="{{ request()->routeIs('ministries.*') ? 'page' : '' }}"
                       class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                        <i class="fas fa-building mr-3"></i>
                        <span class="font-medium">Kementerian</span>
                    </a>
                     <a href="{{ route('partners.index') }}" aria-current="{{ request()->routeIs('partners.*') ? 'page' : '' }}"
                       class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                        <i class="fas fa-handshake mr-3"></i>
                        <span class="font-medium">Rekan</span>
                    </a>
                    <a href="{{ route('settings.index') }}" aria-current="{{ request()->routeIs('settings.*') ? 'page' : '' }}"
                       class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                        <i class="fas fa-cog mr-3"></i>
                        <span class="font-medium">Pengaturan</span>
                    </a>
                @endcan
                {{-- == AKHIR BLOK SUPERADMIN == --}}

                {{-- Link Berita (Semua User) --}}
                <a href="{{ route('posts.index') }}" aria-current="{{ request()->routeIs('posts.*') ? 'page' : '' }}"
                   class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                    <i class="fas fa-newspaper mr-3"></i>
                    <span class="font-medium">Berita</span>
                </a>

                 {{-- Link Profile (Semua User) --}}
                <a href="{{ route('profile.edit') }}" aria-current="{{ request()->routeIs('profile.edit') ? 'page' : '' }}"
                   class="sidebar-link flex items-center px-4 py-3 text-blue-100 hover:text-white rounded-lg transition-colors duration-200 group">
                    <i class="fas fa-user-edit mr-3"></i>
                    <span class="font-medium">Profile</span>
                </a>

                {{-- Tombol Logout --}}
                 <form method="POST" action="{{ route('logout') }}" class="block pt-2 border-t border-white/20 dark:border-gray-700 mt-4"> {{-- Styling pemisah --}}
                     @csrf
                     <button type="submit"
                             onclick="event.preventDefault(); this.closest('form').submit();"
                             class="sidebar-link flex items-center w-full px-4 py-3 text-red-300 hover:text-red-100 hover:bg-red-500/30 rounded-lg transition-colors duration-200 group">
                         <i class="fas fa-sign-out-alt mr-3"></i>
                         <span class="font-medium">Log Out</span>
                     </button>
                 </form>

            </nav>
        </aside>
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden" x-cloak></div>

        <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden"> {{-- Ganti lg:ml-64, tambah overflow --}}
             <header class="sticky top-0 z-10 bg-white dark:bg-gray-800 shadow"> {{-- Kurangi z-index header --}}
                <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8"> {{-- Max-w full agar header penuh --}}
                    <div class="flex items-center justify-between h-16">
                         <div class="flex lg:hidden">
                            <button @click="sidebarOpen = ! sidebarOpen" class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:text-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 focus:text-gray-500 dark:focus:text-gray-300 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': sidebarOpen, 'inline-flex': ! sidebarOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! sidebarOpen, 'inline-flex': sidebarOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                         <div class="hidden lg:flex flex-1"></div> {{-- Tambah flex-1 --}}

                        <div class="flex items-center">
                             <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @if (isset($header))
                <div class="bg-gray-50 dark:bg-gray-700 shadow-inner"> {{-- Styling berbeda untuk heading --}}
                    <div class="max-w-full mx-auto py-4 px-4 sm:px-6 lg:px-8"> {{-- Max-w full --}}
                        {{ $header }}
                    </div>
                </div>
            @endif

            <main class="flex-grow p-6"> {{-- flex-grow agar mengisi ruang sisa --}}
                {{ $slot }}
            </main>

             <footer class="bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 py-4 px-6 text-center text-sm text-gray-500 dark:text-gray-400 mt-auto"> {{-- Tambah mt-auto --}}
                 © {{ date('Y') }} BEM Kampus. All rights reserved.
             </footer>
        </div>
        </div>

    <script>
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            plugins: 'code table lists image link media autoresize',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image link media',
            height: 500,
        });
    </script>
    {{-- Font Awesome (jika belum dimuat global) --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script> --}}
</body>
</html>
