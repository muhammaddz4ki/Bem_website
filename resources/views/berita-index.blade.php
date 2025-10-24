<x-public-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold text-gray-900 mb-8">
                Berita Terbaru
            </h1>

            @if ($posts->isEmpty())
                <p class="text-center text-gray-500">Belum ada berita yang dipublikasikan.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach ($posts as $post)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                </div>
                            @endif

                            <div class="p-6">
                                <div class="mb-2">
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                        {{ $post->category->name }}
                                    </span>
                                    <span class="text-sm text-gray-500 ml-2">oleh {{ $post->user->name }}</span>
                                </div>

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

                </div> <div class="mt-8">
                    {{ $posts->links() }}
                </div>

            @endif

        </div>
    </div>

</x-public-layout>
