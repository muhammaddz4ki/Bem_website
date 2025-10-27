<x-public-layout>
    <x-slot name="title">
        Selamat Datang di BEM POLMAN Bandung
    </x-slot>

    <!-- Hero Section with Full Screen Video/Image -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden bg-black">
        @if ($embedUrl)
            <!-- Video Background -->
            <div class="absolute inset-0 z-0">
                <div class="relative w-full h-full" style="padding-bottom: 56.25%;">
                    <iframe class="absolute top-0 left-0 w-full h-full"
                            src="{{ $embedUrl }}"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        @else
            <!-- Static Background with Gradient -->
            <div class="absolute inset-0 z-0 bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>
        @endif

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

        <!-- Hero Content - CENTERED LAYOUT -->
        <div class="relative z-20 text-center text-white px-4 max-w-6xl mx-auto w-full">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent animate-title-glow">
                    BEM POLITEKNIK
                </h1>
                <h2 class="text-4xl md:text-6xl font-bold mb-4 tracking-wider text-white">
                    MANUFAKTUR BANDUNG
                </h2>
                <div class="w-32 h-2 bg-gradient-to-r from-yellow-400 to-orange-500 mx-auto rounded-full mb-6 animate-scale-in"></div>
                <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
                    Badan Eksekutif Mahasiswa Politeknik Manufaktur Bandung -
                    Bersama membangun kampus yang lebih baik dan berkualitas
                </p>
            </div>

            <!-- CTA Buttons - CENTERED -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12 animate-fade-in-up animation-delay-200">
                <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold py-4 px-8 rounded-full text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-3xl border-2 border-blue-400 flex items-center gap-3">
                    <i class="fas fa-play-circle"></i>
                    <span x-text="t('watchTrailer')">TONTON VIDEO</span>
                </button>

                <a href="#about" class="bg-transparent text-white font-bold py-4 px-8 rounded-full text-lg border-2 border-white hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105 flex items-center gap-3">
                    <i class="fas fa-info-circle"></i>
                    <span x-text="t('learnMore')">SELENGKAPNYA</span>
                </a>
            </div>

            <!-- Stats Section - CENTERED GRID -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mb-8 animate-fade-in-up animation-delay-400">
                <div class="text-center bg-white bg-opacity-15 backdrop-blur-sm rounded-2xl p-6 border border-white border-opacity-20 hover:bg-opacity-25 transition-all duration-300 transform hover:scale-105">
                    <div class="text-3xl font-bold text-yellow-300 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-200" x-text="t('activities')">KEGIATAN</div>
                </div>
                <div class="text-center bg-white bg-opacity-15 backdrop-blur-sm rounded-2xl p-6 border border-white border-opacity-20 hover:bg-opacity-25 transition-all duration-300 transform hover:scale-105">
                    <div class="text-3xl font-bold text-yellow-300 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-200" x-text="t('members')">ANGGOTA</div>
                </div>
                <div class="text-center bg-white bg-opacity-15 backdrop-blur-sm rounded-2xl p-6 border border-white border-opacity-20 hover:bg-opacity-25 transition-all duration-300 transform hover:scale-105">
                    <div class="text-3xl font-bold text-yellow-300 mb-2 counter" data-target="20">0</div>
                    <div class="text-gray-200" x-text="t('programs')">PROGRAM</div>
                </div>
                <div class="text-center bg-white bg-opacity-15 backdrop-blur-sm rounded-2xl p-6 border border-white border-opacity-20 hover:bg-opacity-25 transition-all duration-300 transform hover:scale-105">
                    <div class="text-3xl font-bold text-yellow-300 mb-2 counter" data-target="15">0</div>
                    <div class="text-gray-200" x-text="t('partners')">MITRA</div>
                </div>
            </div>

            <!-- Tags - CENTERED -->
            <div class="flex flex-wrap justify-center gap-4 text-sm animate-fade-in-up animation-delay-600">
                <span class="bg-white bg-opacity-25 px-6 py-3 rounded-full backdrop-blur-sm border border-white border-opacity-30 hover:bg-opacity-40 transition-all duration-300">2025</span>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <div class="text-white text-center">
                <i class="fas fa-chevron-down text-2xl mb-2"></i>
                <p class="text-sm">Scroll untuk menjelajahi</p>
            </div>
        </div>
    </section>

    <!-- Gallery Section - GRID 6 KOTAK -->
    <div class="py-20 bg-gradient-to-b from-gray-900 to-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-5xl font-bold text-white mb-4">
                    Galeri
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-orange-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-300 text-lg">Momen-momen terbaik kegiatan BEM Kampus</p>
            </div>
            @if ($galleries->isEmpty())
                <div class="text-center py-16 bg-gray-800 rounded-2xl border-2 border-dashed border-gray-600 scroll-reveal">
                    <i class="fas fa-images text-6xl text-gray-500 mb-4"></i>
                    <p class="text-gray-400 text-xl">Galeri belum diisi.</p>
                </div>
            @else
                <!-- GRID LAYOUT 6 KOTAK (3 kolom x 2 baris) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($galleries->take(6) as $index => $gallery)
                        <div class="group rounded-2xl overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 scroll-reveal" style="animation-delay: {{ $index * 100 }}ms">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri' }}" class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300"></div>
                            </div>
                            @if ($gallery->title)
                                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 border-t border-gray-700">
                                    <p class="text-center font-bold text-white text-lg">{{ $gallery->title }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Tombol Lihat Semua jika lebih dari 6 galeri -->
                @if ($galleries->count() > 6)
                    <div class="text-center mt-12 scroll-reveal">
                        <a href="{{ route('galeri.index') }}" class="inline-flex items-center justify-center px-10 py-4 border-2 border-yellow-500 text-lg font-bold rounded-xl text-white bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-3xl">
                            Lihat Semua Galeri
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <!-- Ministries Section -->
    <div class="py-20 bg-gradient-to-b from-gray-800 to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-5xl font-bold text-white mb-4">
                    Kementerian
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-purple-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-300 text-lg">Struktur organisasi dan divisi BEM Kampus</p>
            </div>
            @if ($ministries->isEmpty())
                <div class="text-center py-16 bg-gray-800 rounded-2xl border-2 border-dashed border-gray-600 scroll-reveal">
                    <i class="fas fa-building text-6xl text-gray-500 mb-4"></i>
                    <p class="text-gray-400 text-xl">Data kementerian belum diisi.</p>
                </div>
            @else
                <div class="splide scroll-reveal" data-options='{"type":"loop","perPage":3,"perMove":1,"gap":"2rem","arrows":true,"pagination":true,"breakpoints":{"768":{"perPage":1}}}'>
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($ministries as $ministry)
                                <li class="splide__slide">
                                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden h-full border border-gray-700">
                                        <div class="relative overflow-hidden">
                                            <img src="{{ asset('storage/' . $ministry->image) }}" alt="{{ $ministry->name }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                                        </div>
                                        <div class="p-8">
                                            <h3 class="text-2xl font-bold text-white mb-4">{{ $ministry->name }}</h3>
                                            <p class="text-gray-300 leading-relaxed">{{ $ministry->description }}</p>
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

    <!-- Latest News Section -->
    <div class="py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-5xl font-bold text-white mb-4">
                    Berita Terbaru
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-300 text-lg">Informasi dan update terbaru dari BEM Kampus</p>
            </div>
            @if ($posts->isEmpty())
                <div class="text-center py-16 bg-gray-800 rounded-2xl border-2 border-dashed border-gray-600 scroll-reveal">
                    <i class="fas fa-newspaper text-6xl text-gray-500 mb-4"></i>
                    <p class="text-gray-400 text-xl">Belum ada berita.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($posts as $index => $post)
                        <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden flex flex-col h-full border border-gray-700 group scroll-reveal" style="animation-delay: {{ $index * 150 }}ms">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute top-4 left-4">
                                    <span class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                        {{ $post->category->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-8 flex flex-col flex-grow">
                                <h2 class="text-xl font-bold text-white mb-4 line-clamp-2 group-hover:text-blue-300 transition-colors duration-300">
                                    {{ $post->title }}
                                </h2>
                                <p class="text-gray-300 text-sm mb-6 flex-grow line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>
                                <a href="{{ route('berita.show', $post->slug) }}" class="font-bold text-blue-400 hover:text-blue-300 transition-colors duration-200 inline-flex items-center group/link">
                                    Baca Selengkapnya
                                    <span class="ml-3 transform group-hover/link:translate-x-2 transition-transform duration-300">→</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="text-center mt-16 scroll-reveal">
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center px-10 py-4 border-2 border-blue-500 text-lg font-bold rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-3xl">
                        Lihat Semua Berita
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Partnership Section -->
    <div class="py-20 bg-gradient-to-b from-black to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-5xl font-bold text-white mb-4">
                    Kerjasama
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-orange-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-300 text-lg">Mitra strategis BEM Kampus</p>
            </div>
            @if ($partners_kerjasama->isEmpty())
                <div class="text-center py-16 bg-gray-800 rounded-2xl border-2 border-dashed border-gray-600 scroll-reveal">
                    <i class="fas fa-handshake text-6xl text-gray-500 mb-4"></i>
                    <p class="text-gray-400 text-xl">Data kerjasama belum diisi.</p>
                </div>
            @else
                <div class="splide scroll-reveal" data-options='{"type":"loop","perPage":5,"perMove":1,"gap":"3rem","arrows":false,"pagination":false,"autoplay":true,"interval":3000,"breakpoints":{"768":{"perPage":2}}}'>
                    <div class="splide__track">
                        <ul class="splide__list items-center">
                            @foreach ($partners_kerjasama as $partner)
                                <li class="splide__slide">
                                    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-gray-700 hover:border-yellow-500 group">
                                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-20 object-contain grayscale group-hover:grayscale-0 transition-all duration-500">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Media Partner Section -->
    <div class="py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-5xl font-bold text-white mb-4">
                    Media Partner
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-purple-400 to-pink-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-300 text-lg">Media partner BEM Kampus</p>
            </div>
            @if ($partners_media->isEmpty())
                <div class="text-center py-16 bg-gray-800 rounded-2xl border-2 border-dashed border-gray-600 scroll-reveal">
                    <i class="fas fa-broadcast-tower text-6xl text-gray-500 mb-4"></i>
                    <p class="text-gray-400 text-xl">Data media partner belum diisi.</p>
                </div>
            @else
                <div class="splide scroll-reveal" data-options='{"type":"loop","perPage":5,"perMove":1,"gap":"3rem","arrows":false,"pagination":false,"autoplay":true,"interval":3000,"breakpoints":{"768":{"perPage":2}}}'>
                    <div class="splide__track">
                        <ul class="splide__list items-center">
                            @foreach ($partners_media as $partner)
                                <li class="splide__slide">
                                    <div class="bg-gray-800 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border-2 border-gray-700 hover:border-purple-500 group">
                                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-20 object-contain grayscale group-hover:grayscale-0 transition-all duration-500">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div id="visi-misi" class="py-20 bg-gradient-to-b from-black to-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-5xl font-bold text-white mb-4">
                    Visi & Misi
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-teal-500 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-300 text-lg">Arah dan tujuan BEM Kampus</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-10 rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 border-l-4 border-green-500 scroll-reveal">
                    <h3 class="text-3xl font-bold text-white mb-6 flex items-center">
                        <span class="w-3 h-3 bg-green-500 rounded-full mr-4 animate-pulse"></span>
                        Visi
                    </h3>
                    <p class="whitespace-pre-wrap text-gray-300 leading-relaxed text-lg">{{ $settings['visi'] ?? 'Visi belum diatur.' }}</p>
                </div>
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-10 rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2 border-l-4 border-teal-500 scroll-reveal animation-delay-200">
                    <h3 class="text-3xl font-bold text-white mb-6 flex items-center">
                        <span class="w-3 h-3 bg-teal-500 rounded-full mr-4 animate-pulse"></span>
                        Misi
                    </h3>
                    <p class="whitespace-pre-wrap text-gray-300 leading-relaxed text-lg">{{ $settings['misi'] ?? 'Misi belum diatur.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Line Clamp */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Hero Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                transform: scaleX(0);
            }
            to {
                transform: scaleX(1);
            }
        }

        @keyframes titleGlow {
            0%, 100% {
                text-shadow: 0 0 20px rgba(96, 165, 250, 0.5);
            }
            50% {
                text-shadow: 0 0 40px rgba(168, 85, 247, 0.8);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
            opacity: 0;
        }

        .animate-scale-in {
            animation: scaleIn 0.8s ease-out forwards;
            transform-origin: center;
        }

        .animate-title-glow {
            animation: titleGlow 3s ease-in-out infinite;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-400 {
            animation-delay: 400ms;
        }

        .animation-delay-600 {
            animation-delay: 600ms;
        }

        /* Scroll Reveal Animation */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Splide Customization */
        .splide__arrow {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        .splide__arrow:hover {
            background: rgba(255, 255, 255, 0.2) !important;
            transform: scale(1.1);
        }
        .splide__pagination__page {
            background: rgba(255, 255, 255, 0.3) !important;
            transition: all 0.3s ease;
        }
        .splide__pagination__page.is-active {
            background: linear-gradient(to right, #f59e0b, #f97316) !important;
            transform: scale(1.2);
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
        // Intersection Observer for Scroll Reveal
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.scroll-reveal');

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(element => {
                revealObserver.observe(element);
            });

            // Counter Animation
            const counters = document.querySelectorAll('.counter');
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-target'));
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        let current = 0;

                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                counter.textContent = Math.ceil(current) + '+';
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target + '+';
                            }
                        };

                        updateCounter();
                        counterObserver.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });

            // Parallax Effect on Hero Section
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const heroContent = document.querySelector('.relative.z-20');
                if (heroContent && scrolled < window.innerHeight) {
                    heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
                    heroContent.style.opacity = 1 - (scrolled / window.innerHeight);
                }
            });
        });
    </script>
</x-public-layout>
