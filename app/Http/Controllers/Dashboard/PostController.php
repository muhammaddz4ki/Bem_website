<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

// 1. TAMBAHKAN INI (Untuk mengimpor Trait)
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    // 2. TAMBAHKAN INI (Untuk menggunakan Trait)
    use AuthorizesRequests;

    /**
     * Menampilkan daftar semua berita.
     */
    public function index()
    {
        $posts = Post::with(['category', 'user'])->latest()->get();

        return view('dashboard.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.posts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:posts',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|file|max:2048',
            'excerpt' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');
        $validatedData['user_id'] = auth()->id();

        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Berita baru berhasil dipublikasikan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();

        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Mengupdate data berita di database.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validatedData = $request->validate([
            'title' => [
                'required', 'string', 'max:255',
                Rule::unique('posts')->ignore($post->id),
            ],
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|file|max:2048',
            'excerpt' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::disk('public')->delete($request->oldImage);
            }
            $imagePath = $request->file('image')->store('post-images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Menghapus data berita dari database.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Berita berhasil dihapus!');
    }
}
