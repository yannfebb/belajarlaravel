@extends('layouts.user-app')
@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-black mb-4">Blog Detail</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Detail Section Start -->
<div class="container-fluid py-5 about bg-light">
    <div class="container py-5">
        <div class="row g-5 align-items-start">
            <!-- Sisi Kiri: Gambar Unggulan Artikel -->
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="blog-detail-img border rounded overflow-hidden shadow-sm">
                    <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('img/blog-1.jpg') }}"
                         class="img-fluid w-100"
                         alt="{{ $blog->title }}"
                         style="object-fit: cover; max-height: 450px;">
                </div>
            </div>

            <!-- Sisi Kanan: Konten dan Detail Artikel -->
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                <!-- Kategori Artikel -->


                <!-- Judul Artikel -->
                <h1 class="text-dark mb-3 display-5">{{ $blog->title }}</h1>

                <!-- Meta Info (Tanggal, Penulis, Komentar) -->
                <div class="d-flex flex-wrap gap-3 mb-4 text-muted border-bottom pb-3">
                    <span><i class="fas fa-user me-2 text-primary"></i>By {{ $blog->user->name ?? 'Anonymous' }}</span>
                    <span><i class="fas fa-calendar-alt me-2 text-primary"></i>{{ $blog->created_at->format('d M Y') }}</span>
                    <span><i class="fas fa-comment-alt me-2 text-primary"></i>{{ $blog->comments->count() }} Comments</span>
                </div>

                <!-- Isi Konten Artikel Lengkap -->
                <div class="text-dark mb-4 lh-base blog-content-text">
                    {!! $blog->content !!}
                </div>

                <!-- Info Tambahan / Metadata Tags jika diperlukan -->
                @if($blog->tags->count() > 0)
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="mb-2 text-secondary"><i class="fas fa-tags me-2"></i>Tags:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($blog->tags as $tag)
                                    <span class="badge bg-primary text-white p-2 btn-border-radius">#{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Tombol Kembali ke Daftar Blog -->
                <a href="{{ url('/blog') }}" class="btn btn-primary px-4 py-2.5 btn-border-radius">
                    <i class="fas fa-arrow-left me-2"></i>Back to Blog
                </a>
            </div>
            <div class="blog-grid">
            @forelse($blogs as $index => $blog)
                <div class="blog-item rounded-bottom shadow-sm wow fadeIn" data-wow-delay="{{ 0.1 + (($index % 3) * 0.2) }}s">

                    <div class="blog-img overflow-hidden position-relative img-border-radius">
                        <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('img/blog-1.jpg') }}" class="img-fluid w-100" alt="{{ $blog->title }}">
                    </div>

                    <div class="d-flex justify-content-between px-4 py-3 border-bottom border-primary blog-date-comments">
                        <small class="blog-meta-text">
                            <i class="fas fa-calendar me-1"></i>
                            {{ $blog->created_at->translatedFormat('d F Y') }}
                        </small>
                        <small class="blog-meta-text">
                            <i class="fas fa-comment-alt me-1"></i>
                            Comments ({{ $blog->comments->count() }})
                        </small>
                    </div>

                    <div class="px-4 pb-4 bg-light rounded-bottom">
                        <div class="blog-text-inner" style="min-height: 120px;">
                            <a href="{{ url('blog/' . $blog->slug) }}" class="h4 d-block mb-3 text-decoration-none text-white">{{ $blog->title }}</a>
                            <p class="text-muted">{{ Str::limit(strip_tags($blog->content), 80, '...') }}</p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ url('blog/' . $blog->slug) }}" class="btn btn-primary text-white px-4 py-2 btn-border-radius">View Details</a>
                        </div>
                    </div>

                </div>
            @empty
                
            @endforelse
        </div>
        </div>
    </div>
</div>
<!-- Blog Detail Section End -->

@endsection
