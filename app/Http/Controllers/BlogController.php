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
        
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
