<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.tiny.cloud/1/v27lkritlmdifu3mg0ge9p2drrd2o6xufm3axeh6uevemvrs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- Menggunakan include untuk memuat navigasi --}}
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            tinymce.init({
                selector: 'textarea.tinymce-editor', // Targetkan textarea dengan class ini
                plugins: 'code table lists image link media autoresize', // Plugin yang ingin digunakan
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image link media', // Tombol toolbar
                height: 500, // Tinggi editor
                // Konfigurasi tambahan (opsional)
                // image_title: true,
                // automatic_uploads: true,
                // file_picker_types: 'image',
                // file_picker_callback: function (cb, value, meta) { ... } // Untuk upload gambar kustom
            });
        </script>

    </body>
</html>
