<x-public-layout>

    <x-slot name="title">
        {{ $post->title }} - BEM Kampus
    </x-x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
                @endif

                <div class="p-8 md:p-12">

                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        {{ $post->title }}
                    </h1>

                    <div class="flex items-center text-sm text-gray-500 mb-6 space-x-4">
                        <div>
                            <span>Kategori:</span>
                            <a href="{{ route('kategori.posts', $post->category->slug) }}" class="font-semibold text-blue-600 hover:underline">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        <div>
                            <span>Penulis:</span>
                            <span class="font-semibold text-gray-700">
                                {{ $post->user->name }}
                            </span>
                        </div>
                        <div>
                            <span>Dipublikasikan:</span>
                            <span class="font-semibold text-gray-700">
                                {{ $post->created_at->format('d F Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="prose max-w-none prose-lg text-gray-800">
                        <p class="whitespace-pre-wrap">{{ $post->content }}</p>
                    </div>

                    <div class="mt-10 border-t pt-6">
                        <a href="{{ route('berita.index') }}" class="font-semibold text-blue-600 hover:text-blue-800">
                            &larr; Kembali ke semua berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
