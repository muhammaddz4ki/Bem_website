<x-public-layout>
    <x-slot name="title">
        {{ $post->title }} - BEM Kampus
    </x-slot>

    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        @if ($post->image)
            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                     class="w-full h-full object-cover" id="heroImage">
                <div class="absolute inset-0 bg-gradient-to-b from-blue-900/80 via-slate-900/90 to-slate-900"></div>
            </div>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-indigo-900 to-slate-900"></div>
        @endif

        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <nav class="flex justify-center mb-6 scroll-reveal">
                <ol class="flex items-center space-x-2 text-sm backdrop-blur-sm bg-white/10 px-6 py-3 rounded-full border border-white/20">
                    <li>
                        <a href="{{ url('/') }}" class="text-blue-200 hover:text-white transition-colors duration-200">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="text-blue-300">/</li>
                    <li>
                        <a href="{{ route('berita.index') }}" class="text-blue-200 hover:text-white transition-colors duration-200">
                            Berita
                        </a>
                    </li>
                    <li class="text-blue-300">/</li>
                    <li class="text-white font-semibold">{{ Str::limit($post->title, 30) }}</li>
                </ol>
            </nav>

            <div class="mb-6 scroll-reveal animation-delay-200">
                <a href="{{ route('kategori.posts', $post->category->slug) }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold rounded-full shadow-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-tag mr-2"></i>
                    {{ $post->category->name }}
                </a>
            </div>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-8 leading-tight scroll-reveal animation-delay-400">
                {{ $post->title }}
            </h1>

            <div class="flex flex-wrap items-center justify-center gap-6 text-blue-100 scroll-reveal animation-delay-600">
                <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-sm px-5 py-3 rounded-full border border-white/20">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white text-sm font-bold">
                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                        </span>
                    </div>
                    <div class="text-left">
                        <p class="text-xs text-blue-200">Penulis</p>
                        <p class="font-semibold text-white">{{ $post->user->name }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-5 py-3 rounded-full border border-white/20">
                    <i class="far fa-calendar text-blue-300"></i>
                    <span class="font-semibold">{{ $post->created_at->format('d M Y') }}</span>
                </div>

                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-5 py-3 rounded-full border border-white/20">
                    <i class="far fa-clock text-blue-300"></i>
                    <span class="font-semibold">{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} menit baca</span>
                </div>

                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-5 py-3 rounded-full border border-white/20">
                    <i class="far fa-eye text-blue-300"></i>
                    <span class="font-semibold">{{ rand(100, 999) }} views</span>
                </div>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <div class="text-white text-center">
                <i class="fas fa-chevron-down text-2xl mb-2"></i>
                <p class="text-sm">Scroll untuk membaca</p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 0L60 8C120 16 240 32 360 42.7C480 53 600 59 720 58.7C840 59 960 53 1080 48C1200 43 1320 37 1380 34.7L1440 32V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="#0f172a"/>
            </svg>
        </div>
    </section>

    <div class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <article class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-700 scroll-reveal">

                @if ($post->image)
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                             class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                    </div>
                @endif

                <div class="p-8 md:p-12 lg:p-16">

                    <div class="prose prose-lg prose-invert max-w-none">
                        <div class="text-gray-300 text-lg leading-loose space-y-6">
                            {{-- Ganti dari {!! nl2br(e($post->content)) !!} --}}
                            {!! $post->content !!}
                        </div>
                    </div>

                    <div class="my-12 border-t border-slate-700"></div>

                    <div class="scroll-reveal">
                        <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                            <i class="fas fa-tags mr-3 text-blue-400"></i>
                            Tags & Kategori
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('kategori.posts', $post->category->slug) }}"
                               class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-folder mr-2"></i>
                                {{ $post->category->name }}
                            </a>
                            {{-- Jika kamu punya fitur tags, uncomment ini --}}
                            {{-- @if(isset($post->tags) && $post->tags)
                                @foreach(explode(',', $post->tags) as $tag)
                                    <span class="inline-flex items-center px-5 py-2 bg-slate-700 text-gray-300 font-medium rounded-full border border-slate-600 hover:bg-slate-600 transition-colors duration-300">
                                        <i class="fas fa-hashtag mr-2 text-blue-400"></i>
                                        {{ trim($tag) }}
                                    </span>
                                @endforeach
                            @endif --}}
                        </div>
                    </div>

                    <div class="my-12 border-t border-slate-700"></div>

                    <div class="scroll-reveal">
                        <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                            <i class="fas fa-share-alt mr-3 text-blue-400"></i>
                            Bagikan Artikel
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            <button onclick="shareToFacebook()" class="flex items-center space-x-3 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </button>
                            <button onclick="shareToTwitter()" class="flex items-center space-x-3 px-6 py-3 bg-sky-500 text-white font-semibold rounded-xl hover:bg-sky-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </button>
                            <button onclick="shareToWhatsApp()" class="flex items-center space-x-3 px-6 py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </button>
                            <button onclick="copyLink()" class="flex items-center space-x-3 px-6 py-3 bg-slate-700 text-white font-semibold rounded-xl hover:bg-slate-600 transition-all duration-300 transform hover:scale-105 shadow-lg border border-slate-600">
                                <i class="fas fa-link"></i>
                                <span>Salin Link</span>
                            </button>
                        </div>
                    </div>

                    <div class="my-12 border-t border-slate-700"></div>

                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 scroll-reveal">
                        <a href="{{ route('berita.index') }}"
                           class="inline-flex items-center px-8 py-4 bg-slate-700 text-white font-bold rounded-xl hover:bg-slate-600 transition-all duration-300 transform hover:scale-105 border border-slate-600 shadow-lg group">
                            <i class="fas fa-arrow-left mr-3 group-hover:-translate-x-1 transition-transform duration-300"></i>
                            Kembali ke Semua Berita
                        </a>

                        <a href="{{ url('/') }}"
                           class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-home mr-3"></i>
                            Ke Beranda
                        </a>
                    </div>
                </div>
            </article>

            <div class="mt-20 scroll-reveal">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-white mb-4">
                        Berita Terbaru Lainnya
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-indigo-400 mx-auto rounded-full"></div>
                </div>

                <div class="bg-gradient-to-br from-blue-900 to-indigo-900 rounded-3xl p-12 text-center border border-blue-700 shadow-2xl">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white bg-opacity-20 backdrop-blur-sm rounded-full mb-6">
                        <i class="fas fa-newspaper text-4xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">
                        Jelajahi Berita Lainnya
                    </h3>
                    <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                        Temukan lebih banyak artikel menarik dan informasi terbaru dari BEM Kampus
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('berita.index') }}"
                           class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-900 font-bold rounded-xl hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 shadow-xl">
                            <i class="fas fa-list mr-3"></i>
                            Lihat Semua Berita
                        </a>
                        <a href="{{ route('kategori.posts', $post->category->slug) }}"
                           class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-blue-900 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-tag mr-3"></i>
                            Kategori: {{ $post->category->name }}
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
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

        /* Animation Delays */
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-400 { animation-delay: 400ms; }
        .animation-delay-600 { animation-delay: 600ms; }

        /* Prose Styling */
        .prose-invert {
            color: #e5e7eb; /* Ganti dengan warna teks terangmu */
        }
        .prose-invert p, .prose-invert ul, .prose-invert ol, .prose-invert li, .prose-invert blockquote {
             color: #d1d5db; /* Sesuaikan */
        }
        .prose-invert strong {
            color: #ffffff; /* Sesuaikan */
        }
        .prose-invert a {
            color: #60a5fa; /* Ganti dengan warna link terangmu */
        }
         .prose-invert a:hover {
            color: #93c5fd;
        }
        .prose-invert h1, .prose-invert h2, .prose-invert h3, .prose-invert h4, .prose-invert h5, .prose-invert h6 {
            color: #f9fafb; /* Sesuaikan */
        }
        /* Style untuk gambar dalam konten prose */
        .prose-invert img {
            border-radius: 0.5rem; /* rounded-lg */
            margin-top: 2em;
            margin-bottom: 2em;
            max-width: 100%;
            height: auto;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
        }


        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Parallax Effect */
        #heroImage {
            will-change: transform;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for Scroll Reveal
            const revealElements = document.querySelectorAll('.scroll-reveal');

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(element => {
                revealObserver.observe(element);
            });

            // Parallax Effect for Hero Image
            const heroImage = document.getElementById('heroImage');
            if (heroImage) {
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    // Kurangi rate agar efek parallax lebih halus
                    const rate = scrolled * 0.25;
                    heroImage.style.transform = `translate3d(0, ${rate}px, 0)`;
                });
            }
        });

        // Share Functions
        function shareToFacebook() {
            const url = window.location.href;
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank', 'width=600,height=400');
        }

        function shareToTwitter() {
            const url = window.location.href;
            const text = document.title;
            window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`, '_blank', 'width=600,height=400');
        }

        function shareToWhatsApp() {
            const url = window.location.href;
            const text = document.title;
            window.open(`https://wa.me/?text=${encodeURIComponent(text + ' - ' + url)}`, '_blank');
        }

        function copyLink() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                // Ganti alert dengan notifikasi yang lebih modern jika diinginkan
                alert('Link berhasil disalin ke clipboard!');
            });
        }
    </script>

    {{-- Font Awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-public-layout>
