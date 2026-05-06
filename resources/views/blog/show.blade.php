@extends('layouts.app')

@section('content')

    <!-- Breadcrumb Navigation -->
    <div class="container-fluid">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb" style="background-color: transparent; padding: 0; border-bottom: 2px solid #E8EEF5;">
                <li class="breadcrumb-item"><a href="/" style="color: #4A90E2; text-decoration: none;"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}" style="color: #4A90E2; text-decoration: none;"><i class="fas fa-newspaper"></i> Blog Posts</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-eye"></i> View Post</li>
            </ol>
        </nav>
    </div>

    <!-- Post Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card" style="border: 1px solid #E8EEF5; border-radius: 12px; box-shadow: 0 2px 8px rgba(74, 144, 226, 0.08);">
                    <!-- Post Header -->
                    <div class="card-header" style="background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%); border-bottom: none;">
                        <h2 class="card-title" style="color: white; margin: 0; font-size: 24px; font-weight: 700;">
                            {{ $post->title }}
                        </h2>
                    </div>

                    <!-- Post Meta -->
                    <div style="background-color: #F7F9FC; padding: 15px 20px; border-bottom: 1px solid #E8EEF5;">
                        <p style="margin: 0; color: #7F8C8D; font-size: 14px;">
                            <i class="fas fa-calendar"></i> Published on {{ $post->created_at->format('d M Y') }} at {{ $post->created_at->format('H:i') }}
                        </p>
                    </div>

                    <!-- Post Body -->
                    <div class="card-body" style="padding: 30px;">
                        <div class="post-content" style="font-size: 16px; line-height: 1.8; color: #2C3E50; word-wrap: break-word;">
                            {{ $post->content }}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="card-footer" style="background-color: #F7F9FC; border-top: 1px solid #E8EEF5; display: flex; gap: 12px; justify-content: flex-end; flex-wrap: wrap;">
                        <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Post
                        </a>

                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                                <i class="fas fa-trash"></i> Delete Post
                            </button>
                        </form>

                        <a href="{{ route('blog.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection