@extends('user.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Prestasi Details</h2>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/user-dokumentasi">Dokumentasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dokumentasi Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            @foreach ($dokumentasi as $item)
                <div class="container">

                    <div class="row gy-4">

                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">
                                    <div class="pic"><img src="{{ asset('images/dokumentasi/' . $item->media) }}"
                                            class="img-fluid" alt=""></div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="portfolio-info">
                                <h3>Detail Dokumentasi {{ $item->nama }}</h3>
                                <ul>
                                    <li><strong>Nama</strong>: {{ $item->nama }}</li>
                                    <li><strong>Deskripsi</strong>: {{ $item->deskripsi }}</li>
                                    <li><strong>Waktu</strong>: {{ $item->waktu }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
