@foreach($blogs as $index => $blog)
    <div class="blog-item rounded-bottom shadow-sm wow fadeIn" data-wow-delay="{{ 0.1 + (($index % 3) * 0.2) }}s">
        <div class="blog-img overflow-hidden position-relative img-border-radius">
            <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('img/blog-1.jpg') }}" class="img-fluid w-100" alt="{{ $blog->title }}">
        </div>

        <div class="d-flex justify-content-between px-4 py-3 border-bottom border-primary blog-date-comments">
            <small class="blog-meta-text"><i class="fas fa-calendar me-1"></i>{{ $blog->created_at->translatedFormat('d F Y') }}</small>
            <small class="blog-meta-text"><i class="fas fa-comment-alt me-1"></i>Comments ({{ $blog->comments->count() }})</small>
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
@endforeach
