@extends('user.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Pengumuman Details</h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/user-pengumuman">Pengumuman</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengumuman Detail</li>
                        </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            @foreach ($pengumuman as $item)
                <div class="container">

                    <div class="row gy-4">

                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">
                                    <div class="pic"><img src="{{ asset('images/pengumuman/' . $item->media) }}"
                                        class="img-fluid" alt=""></div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="portfolio-info">
                                <h3>Detail Pengumuman {{ $item->judul }}</h3>
                                <ul>
                                    <li><strong>Nama Kegiatan</strong>: {{ $item->Judul }}</li>
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
