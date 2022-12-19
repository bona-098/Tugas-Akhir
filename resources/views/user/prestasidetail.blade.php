@extends('user.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Prestasi Details</h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/user-prestasi">Prestasi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Prestasi Detail</li>
                        </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            @foreach ($prestasi as $item)
                <div class="container">

                    <div class="row gy-4">

                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">
                                    <div class="pic"><img src="{{ asset('images/prestasi/' . $item->foto) }}"
                                        class="img-fluid" alt=""></div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>


                        {{-- <div class="col-lg-6"> --}}
                            <div class="portfolio-info">
                                <h3>Detail Prestasi {{ $item->nama_kegiatan }}</h3>
                                <ul>
                                    <li><strong>Nama Kegiatan</strong>: {{ $item->nama_kegiatan }}</li>
                                    <li><strong>Jenis Kegiatan</strong>: {{ $item->jenis_kegiatan }}</li>
                                    <li><strong>Partisipasi</strong>: {{ $item->partisipasi }}</li>
                                    <li><strong>Deskripsi</strong>: {{ $item->deskripsi }}</li>
                                    <li><strong>Penyelenggara</strong>: {{ $item->penyelenggara }}</li>
                                    <li><strong>Waktu</strong>: {{ $item->waktu }}</li>
                                    <li><strong>tempat</strong>: {{ $item->tempat }}</li>
                                </ul>
                            </div>
                        {{-- </div> --}}

                    </div>

                </div>
            @endforeach
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->
@endsection
