@extends('layouts.app')

{{-- Kirim CSS Select2 ke tumpukan HEAD AdminLTE --}}
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* Penyesuaian UI Select2 agar serasi dengan tema gelap AdminLTE */
    .select2-container--default .select2-selection--multiple {
        background-color: #2b3035 !important;
        border: 1px solid #495057 !important;
        padding-top: 4px;
        min-height: 38px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #495057 !important;
        border: 1px solid #6c757d !important;
        color: #fff !important;
        padding: 2px 8px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #ff6b6b !important;
        margin-right: 5px;
    }
    .select2-dropdown {
        background-color: #2b3035 !important;
        color: #fff !important;
        border: 1px solid #495057 !important;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #fd7e14 !important;
    }
    .select2-container--default .select2-search--inline .select2-search__field {
        color: #fff !important;
    }
</style>
@endsection

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

                <form method="POST" action="{{ route('blog.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Isi Konten</label>
                        <textarea name="content" id="editor" class="form-control
                        @error('content') is-invalid
                        @enderror" rows="8" required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $post->slug) }}" required>
                        @error('slug')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Gambar</label>
                        @if($post->featured_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Gambar saat ini" style="max-width: 200px; max-height: 200px;">
                                <p class="text-muted small mt-1">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal: 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        @error('featured_image')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="tags">Tags Artikel (Pilih 1 - 3 Tag)</label>
                        <select name="tags[]" id="tags" class="form-control select2" multiple="multiple" data-placeholder="Klik untuk memilih tags..." style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) || $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')
                            <small class="text-danger d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('blog.index') }}" class="btn btn-secondary">Batal</a>

                </form>

            </div>
        </div>

    </div>
</section>
@endsection

{{-- Kirim Script JavaScript ke tumpukan paling bawah Layout AdminLTE --}}
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@41.0.0/build/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi Dropdown Select2 Multiple
        $('#tags').select2({
            maximumSelectionLength: 3,
            placeholder: "Klik atau ketik tag yang dicari...",
            allowClear: true,
            language: {
                maximumSelected: function (e) {
                    return "Maksimal pemilihan tag adalah " + e.maximum + " data saja.";
                }
            }
        });

        // Inisialisasi Editor Teks Modern
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection
