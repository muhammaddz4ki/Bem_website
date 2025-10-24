<x-public-layout>

    <x-slot name="title">
        Selamat Datang di BEM Kampus
    </x-slot>

    <div class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            @if ($embedUrl)
                <div class="relative" style="padding-bottom: 56.25%;"> <iframe class="absolute top-0 left-0 w-full h-full rounded-lg shadow-xl"
                            src="{{ $embedUrl }}"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>
            @else
                <div class="text-center py-20">
                    <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl">
                        <span class="block">Selamat Datang di</span>
                        <span class="block text-blue-400">Website Resmi BEM Kampus</span>
                    </h1>
                </div>
            @endif
        </div>
    </div>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                Galeri
            </h2>
            @if ($galleries->isEmpty())
                <p class="text-center text-gray-500">Galeri belum diisi.</p>
            @else
                <div class="splide" data-options='{"type":"loop","perPage":3,"perMove":1,"gap":"1rem","pagination":false,"breakpoints":{"768":{"perPage":1}}}'>
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($galleries as $gallery)
                                <li class="splide__slide">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}" class="w-full h-64 object-cover rounded-lg shadow-md">
                                    @if ($gallery->title)
                                        <p class="mt-2 text-center font-semibold text-gray-700">{{ $gallery->title }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                Kementerian
            </h2>
            @if ($ministries->isEmpty())
                <p class="text-center text-gray-500">Data kementerian belum diisi.</p>
            @else
                <div class="splide" data-options='{"type":"loop","perPage":3,"perMove":1,"gap":"1rem","arrows":true,"pagination":false,"breakpoints":{"768":{"perPage":1}}}'>
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($ministries as $ministry)
                                <li class="splide__slide">
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                        <img src="{{ asset('storage/' . $ministry->image) }}" alt="{{ $ministry->name }}" class="w-full h-48 object-cover">
                                        <div class="p-6">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $ministry->name }}</h3>
                                            <p class="text-gray-700 text-sm">{{ $ministry->description }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                Berita Terbaru
            </h2>
            @if ($posts->isEmpty())
                <p class="text-center text-gray-500">Belum ada berita.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full mb-2">
                                    {{ $post->category->name }}
                                </span>
                                <h2 class="text-xl font-bold text-gray-900 mb-2">
                                    {{ $post->title }}
                                </h2>
                                <p class="text-gray-700 text-sm mb-4">
                                    {{ $post->excerpt }}
                                </p>
                                <a href="{{ route('berita.show', $post->slug) }}" class="font-semibold text-blue-600 hover:text-blue-800">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="text-center mt-10">
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Lihat Semua Berita
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                Kerjasama
            </h2>
            @if ($partners_kerjasama->isEmpty())
                <p class="text-center text-gray-500">Data kerjasama belum diisi.</p>
            @else
                <div class="splide" data-options='{"type":"loop","perPage":5,"perMove":1,"gap":"1.5rem","arrows":false,"pagination":false,"autoplay":true,"interval":3000,"breakpoints":{"768":{"perPage":2}}}'>
                    <div class="splide__track">
                        <ul class="splide__list items-center">
                            @foreach ($partners_kerjasama as $partner)
                                <li class="splide__slide">
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-20 object-contain grayscale hover:grayscale-0 transition duration-300">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                Media Partner
            </h2>
            @if ($partners_media->isEmpty())
                <p class="text-center text-gray-500">Data media partner belum diisi.</p>
            @else
                <div class="splide" data-options='{"type":"loop","perPage":5,"perMove":1,"gap":"1.5rem","arrows":false,"pagination":false,"autoplay":true,"interval":3000,"breakpoints":{"768":{"perPage":2}}}'>
                    <div class="splide__track">
                        <ul class="splide__list items-center">
                            @foreach ($partners_media as $partner)
                                <li class="splide__slide">
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-20 object-contain grayscale hover:grayscale-0 transition duration-300">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div id="visi-misi" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                Visi & Misi
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Visi</h3>
                    <p class="whitespace-pre-wrap">{{ $settings['visi'] ?? 'Visi belum diatur.' }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Misi</h3>
                    <p class="whitespace-pre-wrap">{{ $settings['misi'] ?? 'Misi belum diatur.' }}</p>
                </div>
            </div>
        </div>
    </div>

</x-public-layout>
