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
                        <label>Foto Profile</label>

                        <input type="file"
                            name="photo"
                            class="form-control">
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