<x-public-layout>
    <x-slot name="title">
        Kategori: {{ $category->name }}
    </x-slot>

    <!-- Hero Section with Gradient Background -->
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 py-20 overflow-hidden">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <!-- Floating Gradient Orbs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500 rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-indigo-500 rounded-full filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Breadcrumb -->
            <nav class="flex justify-center mb-6 scroll-reveal">
                <ol class="flex items-center space-x-2 text-sm">
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
                    <li class="text-white font-semibold">{{ $category->name }}</li>
                </ol>
            </nav>

            <!-- Category Badge -->
            <div class="mb-6 scroll-reveal animation-delay-200">
                <span class="inline-flex items-center px-6 py-3 bg-white bg-opacity-20 backdrop-blur-sm rounded-full text-white border border-white border-opacity-30">
                    <i class="fas fa-tag mr-2"></i>
                    Kategori
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 scroll-reveal animation-delay-400">
                {{ $category->name }}
            </h1>

            <!-- Description if available -->
            @if($category->description)
                <p class="text-xl text-blue-100 max-w-3xl mx-auto mb-8 scroll-reveal animation-delay-600">
                    {{ $category->description }}
                </p>
            @endif

            <!-- Divider -->
            <div class="w-32 h-1 bg-gradient-to-r from-blue-400 to-indigo-400 mx-auto rounded-full scroll-reveal animation-delay-800"></div>

            <!-- Stats -->
            <div class="mt-8 scroll-reveal animation-delay-1000">
                <div class="inline-flex items-center space-x-4 bg-white bg-opacity-15 backdrop-blur-sm rounded-2xl px-8 py-4 border border-white border-opacity-20">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">{{ $posts->total() }}</div>
                        <div class="text-sm text-blue-200">Total Berita</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 0L60 8C120 16 240 32 360 42.7C480 53 600 59 720 58.7C840 59 960 53 1080 48C1200 43 1320 37 1380 34.7L1440 32V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="#0f172a"/>
            </svg>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 py-20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($posts->isEmpty())
                <!-- Empty State -->
                <div class="text-center py-20 scroll-reveal">
                    <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full mb-8 shadow-2xl">
                        <i class="fas fa-newspaper text-5xl text-white"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Belum Ada Berita</h3>
                    <p class="text-gray-400 text-lg mb-8">Kategori ini belum memiliki berita. Silakan cek kategori lainnya.</p>
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Semua Berita
                    </a>
                </div>
            @else
                <!-- News Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach ($posts as $index => $post)
                        <article class="group bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-3 overflow-hidden border border-slate-700 hover:border-blue-500 scroll-reveal" style="animation-delay: {{ $index * 100 }}ms">
                            <!-- Image Container -->
                            <div class="relative overflow-hidden h-64">
                                @if ($post->image)
                                    <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-900 to-indigo-900 flex items-center justify-center">
                                        <i class="fas fa-image text-6xl text-blue-300 opacity-50"></i>
                                    </div>
                                @endif

                                <!-- Overlay Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>

                                <!-- Category Badge on Image -->
                                <div class="absolute top-4 left-4">
                                    <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-xs font-bold rounded-full shadow-lg backdrop-blur-sm">
                                        <i class="fas fa-tag mr-2"></i>
                                        {{ $post->category->name }}
                                    </span>
                                </div>

                                <!-- Reading Time Badge -->
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center px-3 py-2 bg-black bg-opacity-50 text-white text-xs font-semibold rounded-lg backdrop-blur-sm">
                                        <i class="far fa-clock mr-1"></i>
                                        {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-8">
                                <!-- Meta Info -->
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center text-sm text-gray-400">
                                        <i class="far fa-user mr-2 text-blue-400"></i>
                                        <span>{{ $post->user->name }}</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-400">
                                        <i class="far fa-calendar mr-2 text-blue-400"></i>
                                        <span>{{ $post->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h2 class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-blue-300 transition-colors duration-300">
                                    {{ $post->title }}
                                </h2>

                                <!-- Excerpt -->
                                <p class="text-gray-400 text-sm mb-6 line-clamp-3 leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>

                                <!-- Read More Link -->
                                <a href="{{ route('berita.show', $post->slug) }}" class="inline-flex items-center font-bold text-blue-400 hover:text-blue-300 transition-all duration-300 group/link">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fas fa-arrow-right ml-2 transform group-hover/link:translate-x-2 transition-transform duration-300"></i>
                                </a>
                            </div>

                            <!-- Bottom Accent Line -->
                            <div class="h-1 bg-gradient-to-r from-blue-500 to-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="scroll-reveal">
                    <div class="flex justify-center">
                        {{ $posts->links() }}
                    </div>
                </div>

                <!-- Back to All News Button -->
                <div class="text-center mt-12 scroll-reveal">
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-slate-700 to-slate-800 text-white font-bold rounded-xl hover:from-slate-600 hover:to-slate-700 transition-all duration-300 transform hover:scale-105 shadow-xl border border-slate-600">
                        <i class="fas fa-arrow-left mr-3"></i>
                        Lihat Semua Kategori
                    </a>
                </div>
            @endif
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
        .animation-delay-800 { animation-delay: 800ms; }
        .animation-delay-1000 { animation-delay: 1000ms; }

        /* Custom Pagination Styling */
        .pagination {
            @apply flex items-center space-x-2;
        }

        .pagination .page-link {
            @apply px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-gradient-to-r hover:from-blue-600 hover:to-indigo-600 transition-all duration-300 border border-slate-700;
        }

        .pagination .page-item.active .page-link {
            @apply bg-gradient-to-r from-blue-600 to-indigo-600 border-blue-500;
        }

        .pagination .page-item.disabled .page-link {
            @apply opacity-50 cursor-not-allowed;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Hover Glow Effect */
        article:hover {
            box-shadow: 0 20px 50px rgba(59, 130, 246, 0.3);
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
        });
    </script>
</x-public-layout>
