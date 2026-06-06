@extends('layouts.user-app')
@section('content')
  <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4">Our Blog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white" aria-current="page">Our Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-fluid program py-5">
            <div class="container py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h1 class="mb-5 display-3">Semua Berita</h1>
                </div>

                <div class="blog-grid" id="blog-container">
                    @include('public.partials.blog-list')
                </div>

                <div class="text-center my-4" id="blog-loading" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted small mt-2">Loading...</p>
                </div>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let page = 1;
    let hasMorePages = true;
    let isLoading = false;

    $(window).scroll(function() {
        // Deteksi jika user scroll mendekati batas bawah halaman web
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
            if (hasMorePages && !isLoading) {
                loadMoreBlogs();
            }
        }
    });

    function loadMoreBlogs() {
        page++;
        isLoading = true;
        $('#blog-loading').show(); // Menampilkan efek loading spinner

        $.ajax({
            url: "?page=" + page,
            type: "get"
        })
        .done(function(data) {
            // Jika data kosong atau tidak mengembalikan HTML artikel lagi
            if (data.trim() == "") {
                hasMorePages = false;
                $('#blog-loading').html('<p class="text-muted small">Semua artikel telah dimuat.</p>');
                return;
            }

            // Memberikan jeda waktu tiruan agar transisi animasi loading terlihat mulus
            setTimeout(function() {
                $('#blog-loading').hide();
                $("#blog-container").append(data); // Memasukkan baris 9 artikel baru ke dalam grid
                isLoading = false;
            }, 800);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Koneksi server terganggu...');
            $('#blog-loading').hide();
            isLoading = false;
        });
    }
</script>
@endsection
