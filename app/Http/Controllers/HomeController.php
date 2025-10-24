<?php

namespace App\Http\Controllers;

// ===================================
// TAMBAHKAN BARIS INI
// ===================================
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Gallery;
use App\Models\Ministry;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan Halaman Depan (Landing Page) Perkenalan.
     */
    public function home()
    {
        // 1. Ambil Settings (Video, Visi, Misi)
        $settings = Setting::pluck('value', 'key');

        // 2. Logika konversi URL YouTube
        $embedUrl = null;
        $videoUrl = $settings['video_url'] ?? null;

        if ($videoUrl) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $match);
            $videoId = $match[1] ?? null;
            if ($videoId) {
                // Tambahkan parameter controls=0&showinfo=0&rel=0 agar lebih bersih
                $embedUrl = 'https://www.youtube.com/embed/' . $videoId . '?autoplay=1&mute=1&loop=1&playlist=' . $videoId . '&controls=0&showinfo=0&rel=0';
            }
        }

        // 3. Ambil data untuk Landing Page
        $galleries = Gallery::latest()->get();
        $ministries = Ministry::latest()->get();
        $posts = Post::with('category')->latest()->take(3)->get(); // Ambil 3 berita terbaru
        $partners_kerjasama = Partner::where('type', 'kerjasama')->latest()->get();
        $partners_media = Partner::where('type', 'media_partner')->latest()->get();

        // 4. Kirim semua data ke view
        return view('home', [
            'settings' => $settings,
            'embedUrl' => $embedUrl,
            'galleries' => $galleries,
            'ministries' => $ministries,
            'posts' => $posts,
            'partners_kerjasama' => $partners_kerjasama,
            'partners_media' => $partners_media,
        ]);
    }

    /**
     * Menampilkan Halaman Daftar Semua Berita.
     */
    public function beritaIndex()
    {
        $posts = Post::with(['category', 'user'])
                    ->latest()
                    ->paginate(6);

        return view('berita-index', [
            'posts' => $posts
        ]);
    }

    /**
     * Menampilkan Halaman Detail Berita (Satu Berita).
     */
    public function show(Post $post)
    {
        return view('post-detail', [
            'post' => $post
        ]);
    }

    /**
     * Menampilkan Halaman Berita berdasarkan Kategori.
     */
    public function categoryPosts(Category $category)
    {
        $posts = $category->posts()
                        ->with(['category', 'user'])
                        ->latest()
                        ->paginate(6);

        return view('category-posts', [
            'posts' => $posts,
            'category' => $category
        ]);
    }
}
