<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $posts;
    public function __construct()
    {
        // Isi data dummy 
        $this->posts = [
            [
                "id" => 1,
                "judul" => "How to Hack NASA Using CSS",
                "isi" => "Muhehehehehe",
                "waktu_pembuatan" => Carbon::now(),
            ],
            [
                "id" => 2,
                "judul" => "Misteri ';' di JavaScript",
                "isi" => "Kadang ada, kadang tiada.",
                "waktu_pembuatan" => Carbon::now()->subDay(),
            ]
        ];
    }

     public function index()
    {
        return view("blog.index",['posts' => $this->posts]);
    }

     public function create()
    {
        return view("blog.create");
    }

     public function store(Request $request)
    {
        
    }

     public function show(string $id)
    {
        $post = $this->posts[$id] ?? abort(404);

        return view("blog.show",compact("post","id"));
    }

    public function edit(string $id)
    {
        return view("blog.edit");
    }

    
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
        
    }

}