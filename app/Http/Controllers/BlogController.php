<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('blog.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:posts,slug',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['category_id'] = 1;

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('blog.index')
            ->with('success', 'Post berhasil dibuat!');
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        // Cek apakah user adalah pemilik post
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit post ini.');
        }

        return view('blog.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        // Cek apakah user adalah pemilik post
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah post ini.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('blog.show', $post->id)
            ->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Cek apakah user adalah pemilik post
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus post ini.');
        }

        $post->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Post berhasil dihapus!');
    }
}