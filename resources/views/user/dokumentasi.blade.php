@extends('user.app')
@section('content')
    <section id="portfolio" class="portfolio">
        <div class="container py-5">
            <div class="section-title" data-aos="fade-left">
                <h2>dokumentasi</h2>
                <p>Berikut ini merupakan dokumentasi dari kegiatan yang pernah dilakukan oleh student automotive association
                </p>
            </div>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    @foreach ($dokumentasi as $item)
                        <div class="col">
                            <div class="card shadow-sm">
                                <a href="/admin-dokumentasi-edit">
                                    <img width="348px" height="225px"
                                        src="{{ asset('images/dokumentasi/' . $item->media) }}">
                                </a>

                                <div class="card-body">
                                    <p class="card-text">{{ $item->nama }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{ $item->deskripsi }}</small>
                                        <small class="text-muted">{{ $item->waktu }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
