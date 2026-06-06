<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    public function index()
    {
        // Pastikan baris ini menggunakan paginate, bukan get()
        $blogs = Post::latest()->paginate(100);
        // dd($blogs);
        return view('public.blog', compact('blogs'));
    }

    public function show($slug)
    {
        // 1. Ambil data artikel yang sedang dibaca berdasarkan slug
        $blog = Post::where('slug', $slug)->firstOrFail();

        // 2. Ambil 3 artikel terbaru lainnya untuk bagian rekomendasi di bawah
        $blogs = Post::where('id', '!=', $blog->id) // Supaya artikel yang lagi dibaca tidak muncul double di bawah
                     ->latest()
                     ->take(3) // Batasi cuma ambil 3 data agar pas dengan layout 3 kolom
                     ->get();

        // 3. Kirim variabel $blog dan $blogs ke file blade detail
        return view('public.blog-detail', compact('blog', 'blogs'));
    }
}
