<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $posts;
    public function __construct()
    {
        // Isi data dummy di constructor agar langsung tersedia saat class dipanggil
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("blogs.index",['posts' => $this->posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->posts[$id] ?? abort(404);

        return view("blogs.show",compact("post","id"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("blogs.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
