<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="space-y-6">

                            <div>
                                <label for="logo" class="block text-sm font-medium text-gray-700">Logo Website</label>
                                @if (isset($settings['logo_path']) && $settings['logo_path'])
                                    <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Logo Saat Ini" class="mt-2 mb-2 h-16 w-auto rounded">
                                    <input type="hidden" name="oldLogo" value="{{ $settings['logo_path'] }}">
                                @else
                                    <p class="mt-2 text-sm text-gray-500">Belum ada logo.</p>
                                @endif
                                <input type="file" name="logo" id="logo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengganti logo. Rekomendasi: format PNG transparan.</p>
                                @error('logo') {{-- Tampilkan error validasi logo --}}
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="video_url" class="block text-sm font-medium text-gray-700">URL Video YouTube</label>
                                <input type="text" name="video_url" id="video_url"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('video_url') border-red-500 @enderror"
                                       value="{{ old('video_url', $settings['video_url'] ?? '') }}"
                                       placeholder="Contoh: https://www.youtube.com/watch?v=xxxxxxxxxxx">
                                <p class="mt-2 text-sm text-gray-500">Masukkan URL lengkap YouTube (bukan link embed).</p>
                                @error('video_url') {{-- Tampilkan error validasi URL --}}
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="visi" class="block text-sm font-medium text-gray-700">Visi</label>
                                <textarea name="visi" id="visi" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('visi', $settings['visi'] ?? '') }}</textarea>
                            </div>

                            <div>
                                <label for="misi" class="block text-sm font-medium text-gray-700">Misi</label>
                                <textarea name="misi" id="misi" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('misi', $settings['misi'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                                Simpan Pengaturan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
