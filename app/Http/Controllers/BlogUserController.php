<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    // 1. Tambahkan Request $request di dalam kurung index
    public function index(Request $request)
    {
        $blogs = Post::latest()->paginate(6);

        // 2. TAMBAHKAN LOGIKA INI: Cek jika request datang dari scroll AJAX
        if ($request->ajax()) {
            return view('public.partials.blog-list', compact('blogs'))->render();
        }

        return view('public.blog', compact('blogs'));
    }

    public function show($slug)
    {
        // 1. Ambil data artikel yang sedang dibaca berdasarkan slug
        $blog = Post::where('slug', $slug)->firstOrFail();

        // 2. Ambil 3 artikel terbaru lainnya untuk bagian rekomendasi di bawah
        $blogs = Post::where('id', '!=', $blog->id)
                     ->latest()
                     ->take(3)
                     ->get();

        // 3. Kirim variabel $blog dan $blogs ke file blade detail
        return view('public.blog-detail', compact('blog', 'blogs'));
    }
}
