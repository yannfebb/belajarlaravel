@extends('layouts.app')
@section('content')
<!-- Header dengan tombol create post -->
<div class="blog-header-flex mb-4">
    <h2 class="m-0">Blog Posts</h2>
    <a href="{{ route('blog.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Buat Post Baru
    </a>
</div>

<div class="row">

        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card card-outline card-primary">

                    <div class="card-header">
                        <h3 class="card-title">
                            <strong>{{ $post->title }}</strong>
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
        @if($post->featured_image)
                            <div class="akuaku">
                            <i class="fas fa-blog"></i> sudah ada gambarnya    
                            </div>
                        @endif

                    <div class="card-body">

                        <p class="text-muted small">
                            <i class="far fa-clock"></i>
                            {{ $post->created_at->format('Y-m-d H:i') }}
                        </p>

                        <p>
                            {{ $post->content }}
                        </p>

                        <div class="mt-3">
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Shows
                            </a>

                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus post ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
