<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Website BEM Kampus' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <nav class="bg-white shadow-sm" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex items-center shrink-0">
                        <a href="{{ route('home') }}">
                            @if ($logoPath)
                                <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo BEM Kampus" class="block h-9 w-auto">
                            @else
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            @endif
                        </a>
                        <span class="ml-3 font-semibold text-xl text-gray-800 hidden sm:block">BEM Kampus</span>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-10 space-x-8">
                        <a href="{{ route('home') }}" class="font-semibold text-gray-600 hover:text-gray-900 {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Home</a>

                        <a href="{{ route('berita.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 {{ request()->routeIs('berita.index') ? 'text-blue-600' : '' }}">Berita</a>

                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="font-semibold text-gray-600 hover:text-gray-900 inline-flex items-center {{ request()->routeIs('kategori.*') ? 'text-blue-600' : '' }}">
                                <span>Kategori</span>
                                <svg class="ml-1 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" style="display: none;">
                                <div class="py-1">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('kategori.posts', $category->slug) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('home') ? 'border-blue-400 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600' }} text-base font-medium hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">Home</a>
                <a href="{{ route('berita.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('berita.index') ? 'border-blue-400 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600' }} text-base font-medium hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">Berita</a>

                <div class="pt-1">
                    <span class="block pl-3 pr-4 py-2 text-xs font-medium text-gray-400 uppercase">Kategori</span>
                    @foreach ($categories as $category)
                        <a href="{{ route('kategori.posts', $category->slug) }}" class="block pl-5 pr-4 py-2 border-l-4 {{ request()->is('kategori/'.$category->slug) ? 'border-blue-400 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600' }} text-base font-medium hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="space-y-1">
                     @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>


    <main>
        {{ $slot }}
    </main>

    <footer class="mt-12 py-6 bg-gray-800 text-white text-center text-sm">
        © {{ date('Y') }} BEM Kampus. All rights reserved.
    </footer>

</body>
</html>
