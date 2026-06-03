@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Edit Post: {{ $post->title }}</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <form method="POST"
                    action="{{ route('blog.update', $post->id) }}"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Judul</label>

                        <input type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ $post->title }}"
                            required>

                        @error('title')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Isi Konten</label>

                        <textarea name="content"
                            class="form-control @error('content') is-invalid @enderror"
                            rows="4"
                            required>{{ $post->content }}</textarea>

                        @error('content')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Slug</label>

                        <input type="text"
                            name="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            value="{{ $post->slug }}"
                            required>

                        @error('slug')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        @if($post->featured_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Gambar saat ini" style="max-width: 200px; max-height: 200px;">
                                <p class="text-muted small">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal: 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        @error('featured_image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>

                    <a href="{{ route('blog.index') }}"
                        class="btn btn-secondary">
                        Batal
                    </a>

                </form>

            </div>
        </div>

    </div>
</section>

@endsection