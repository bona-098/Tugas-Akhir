@extends('user.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Prestasi Details</h2>
                    <ol>
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
                                        class="img-fluid" width="80" height="80" alt="pp"></div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="portfolio-info">
                                <h3>Detail Prestasi</h3>
                                <ul>
                                    <li><strong>Nama</strong>: {{ $item->nama }}</li>
                                    <li><strong>Nim</strong>: {{ $item->nim }}</li>
                                    <li><strong>Pencapaian</strong>: {{ $item->pencapaian }}</li>
                                    <li><strong>Dospem</strong>: {{ $item->dospem }}</li>
                                    <li><strong>Kategori</strong>: {{ $item->kategori }}</li>
                                    <li><strong>Nama Kegiatan</strong>: {{ $item->nama_kegiatan }}</li>
                                    <li><strong>Penyelenggara</strong>: {{ $item->penyelenggara }}</li>
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
