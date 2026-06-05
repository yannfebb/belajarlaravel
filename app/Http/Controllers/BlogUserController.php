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
        $blog = Post::where('slug', $slug)->firstOrFail();
        return view('public.blog-detail', compact('blog'));
    }
}
