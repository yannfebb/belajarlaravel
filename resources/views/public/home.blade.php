@extends('layouts.user-app')
@section('content')

<div class="container-fluid py-5 hero-header wow fadeIn mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7 col-md-12">
                <h1 class="mb-5 display-1 text-white"></h1>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid program py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <a href="/blog" class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Blog kita</a>
            <h1 class="mb-5 display-3">Berita Terkini</h1>
        </div>

        <div class="blog-grid">
            @forelse($blogs as $index => $blog)
                <div class="blog-item rounded-bottom bg-light shadow-sm wow fadeIn" data-wow-delay="{{ 0.1 + (($index % 3) * 0.2) }}s">

                    <div class="blog-img overflow-hidden position-relative img-border-radius">
                        <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('img/blog-1.jpg') }}" class="img-fluid w-100" alt="{{ $blog->title }}">
                    </div>

                    <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments">
                        <small class="text-dark">
                            <i class="fas fa-calendar me-1 text-dark"></i>
                            {{ $blog->created_at->translatedFormat('d F Y') }}
                        </small>
                        <small class="text-dark">
                            <i class="fas fa-comment-alt me-1 text-dark"></i>
                            Comments ({{ $blog->comments->count() }})
                        </small>
                    </div>



                    <div class="px-4 pb-4 bg-light rounded-bottom">
                        <div class="blog-text-inner" style="min-height: 120px;">
                            <a href="{{ url('blog/' . $blog->slug) }}" class="h4 d-block mb-3 text-decoration-none text-dark">{{ $blog->title }}</a>
                            <p class="text-muted">{{ Str::limit(strip_tags($blog->content), 80, '...') }}</p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ url('blog/' . $blog->slug) }}" class="btn btn-primary text-white px-4 py-2 btn-border-radius">View Details</a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">No blog posts found.</p>
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection
