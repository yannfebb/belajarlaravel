@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Navigation -->
    <div class="container-fluid">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb" style="background-color: transparent; padding: 0; border-bottom: 2px solid #E8EEF5;">
                <li class="breadcrumb-item"><a href="/" style="color: #4A90E2; text-decoration: none;"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}" style="color: #4A90E2; text-decoration: none;"><i class="fas fa-newspaper"></i> Blog Posts</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-edit"></i> Edit Post</li>
            </ol>
        </nav>
    </div>

    <!-- Header Section -->
    <div class="container-fluid mb-4">
        <h1 style="margin: 0; color: #2C3E50; font-size: 28px; font-weight: 700;">
            <i class="fas fa-edit" style="color: #FF9F43;"></i> Edit Blog Post
        </h1>
        <p style="color: #7F8C8D; margin-top: 10px;">Update your post details and content</p>
    </div>

    <!-- Edit Form Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card" style="border: 1px solid #E8EEF5; border-radius: 12px; box-shadow: 0 2px 8px rgba(74, 144, 226, 0.08);">
                    <div class="card-body" style="padding: 30px;">
                        <form method="POST" action="{{ route('blog.update', $post->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label style="color: #2C3E50; font-weight: 600;">Post Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title" value="{{ $post->title }}" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label style="color: #2C3E50; font-weight: 600;">Content</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="6" placeholder="Write your post content here..." required>{{ $post->content }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label style="color: #2C3E50; font-weight: 600;">URL Slug</label>
                                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="post-url-slug" value="{{ $post->slug }}" required>
                                <small style="color: #7F8C8D;">URL-friendly version of your title</small>
                                @error('slug')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div style="display: flex; gap: 12px; margin-top: 30px;">
                                <button type="submit" class="btn btn-warning" style="flex: 1; padding: 12px 24px;">
                                    <i class="fas fa-save"></i> Update Post
                                </button>
                                <a href="{{ route('blog.index') }}" class="btn btn-secondary" style="flex: 1; padding: 12px 24px; text-align: center;">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection