@extends('layouts.user-app')
@section('content')
  <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4">Our Blog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white" aria-current="page">Our Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Blog Start-->
        <div class="container-fluid program py-5">
            <div class="container py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <a href="/blog" class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Blog</a>
                    <h1 class="mb-5 display-3">Semua Berita</h1>
                </div>
                
                <!-- Wadah Utama Grid -->
                <div class="blog-grid">
                    @forelse($blogs as $index => $blog)
                        <!-- Perbaikan: Efek WOW diaplikasikan langsung pada item blog agar tidak merusak koordinat CSS Grid -->
                        <div class="blog-item rounded-bottom bg-light shadow-sm wow fadeIn" data-wow-delay="{{ 0.1 + (($index % 3) * 0.2) }}s">
                            
                            <!-- Gambar Fitur Post -->
                            <div class="blog-img overflow-hidden position-relative img-border-radius">
                                <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('img/blog-1.jpg') }}" class="img-fluid w-100" alt="{{ $blog->title }}">
                            </div>
                            
                            <!-- Tanggal & Komentar -->
                            <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments">
                                <small class="text-dark">
                                    <i class="fas fa-calendar me-1 text-dark"></i>
                                    {{ $blog->created_at->format('d B Y') }}
                                </small>
                                <small class="text-dark">
                                    <i class="fas fa-comment-alt me-1 text-dark"></i>
                                    Comments ({{ $blog->comments->count() }})
                                </small>
                            </div>
                            
                            <!-- Informasi Penulis / Author -->
                            <div class="blog-content d-flex align-items-center px-4 py-3 bg-light">
                                <div class="overflow-hidden rounded-circle border border-primary" style="width: 50px; height: 50px;">
                                    <img src="{{ $blog->user && $blog->user->photo ? asset('storage/' . $blog->user->photo) : asset('img/program-teacher.jpg') }}" class="img-fluid rounded-circle" alt="Author" style="object-fit: cover; width: 100%; height: 100%;">
                                </div>
                                
                            </div>
                            
                            <!-- Potongan Teks Konten & Tombol -->
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
        <!-- Blog End-->

@endsection