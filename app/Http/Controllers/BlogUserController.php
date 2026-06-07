<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    public function index(Request $request)
    {
        // TAMBAHKAN dengan('tags') sebelum latest() agar data tag ikut terambil secara efisien
        $blogs = Post::with('tags')->latest()->paginate(6);

        if ($request->ajax()) {
            return view('public.partials.blog-list', compact('blogs'))->render();
        }

        return view('public.blog', compact('blogs'));
    }

    public function show($slug)
    {
        // 1. Ambil data artikel yang sedang dibaca berdasarkan slug beserta tag-nya
        $blog = Post::with('tags')->where('slug', $slug)->firstOrFail();

        // 2. Ambil 3 artikel terbaru lainnya untuk bagian rekomendasi (ikut sertakan dengan('tags'))
        $blogs = Post::with('tags')->where('id', '!=', $blog->id)
                     ->latest()
                     ->take(3)
                     ->get();

        // 3. Kirim variabel $blog dan $blogs ke file blade detail
        return view('public.blog-detail', compact('blog', 'blogs'));
    }
}
