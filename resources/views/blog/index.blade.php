@extends('layouts.app')

@section('content')
   
    <!-- Header Section -->
    <div class="container-fluid" style="padding-left: 15px; padding-right: 15px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
            <h1 style="margin: 0; color: #2C3E50; font-size: 28px; font-weight: 700;">
                <i class="fas fa-newspaper" style="color: #4A90E2;"></i> All Blog Posts
            </h1>
            <a href="{{ route('blog.create') }}" class="btn btn-success" style="padding: 12px 24px; border-radius: 8px;">
                <i class="fas fa-plus-circle"></i> Create New Post
            </a>
        </div>
        <p style="color: #7F8C8D; margin-top: 10px; margin-bottom: 0;">Manage and view all your blog posts</p>
    </div>

    <!-- Posts Grid -->
    <div class="container-fluid">
        <div class="row">

        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <strong>{{ $post->title }}</strong>
                        </h3>
                    </div>

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
                                <i class="fas fa-eye"></i> Show
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
