@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                        {{-- {{ dd($post) }} --}}

                <h1 class="m-0">Detail Post: {{ $post->title }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Informasi Blog</h3>
                    </div>
                    <div class="card-body">
                        <h3>{{ $post->title }}</h3>
                        
                        <p class="text-muted">
                            <i class="fa fa-calendar"></i>
                            Dibuat pada: {{ $post->created_at->format('d M Y H:i') }}
                        </p>
                        
                        <hr>

                        <div class="post-content" style="font-size: 1.1rem; line-height: 1.6;">
                            {{ $post->content }}
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i> Edit Postingan Ini
                        </a>

                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus post ini?')">
                                <i class="fa fa-trash"></i> Hapus Postingan Ini
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection