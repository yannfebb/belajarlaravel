@extends('layouts.user-app')
@section('content')
 <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- About Start -->
        <div class="container-fluid py-5 about bg-light">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-7 wow fadeIn" data-wow-delay="1s">
                        <h1 class="text-dark mb-4 display-5">Apa itu Berita Game ID ?</h1>
                        <p class="text-dark mb-4">Berita Game ID adalah salah satu Media Game di Indonesia, yang membahas berita perkembangan seputar dunia Game, dimulai dari Berita Game, Tips and Trick, Diskusi Game, Review Game, sampai menjadi penyelenggara Events Online & Offline.
                        </p>
                        <p class="text-dark mb-4">Kami berusaha semaksimal mungkin untuk menjadi Media Game yang memberikan manfaat untuk Konten Informatif & Edukatif agar dapat membantu membangun industri game di tanah air dan dipercaya untuk meliput beberapa event-event game di dalam negeri & luar negeri.
                        </p>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Game PC</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Game Action</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Game AAA</h6>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Game Mobile</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Game gacha</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Game Indie</h6>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <img src="{{ asset('assets/img/qrsaweria.png') }}" class="img-fluid about-img mb-4" alt="Berita Game ID">

                </div>
            </div>
        </div>
@endsection
