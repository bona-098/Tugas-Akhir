@extends('user.app')
@section('content')
    <section id="team" class="team">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title" data-aos="fade-right">
                        <h2>Prestasi</h2>
                        <p>Berikut ini adalah prestasi yang sudah dicapai oleh SAA</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($prestasi as $item)
                            <div class="col-lg-6">
                                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="pic"><img src="{{ asset('images/prestasi/' . $item->foto) }}"
                                            class="img-fluid" alt=""></div>
                                    <div class="member-info">
                                        <h4>{{ $item->nama }}</h4>
                                        <span>{{ $item->nim }}</span>
                                        <p>{{ $item->nama_kegiatan }}</p>
                                        <div class="social">
                                            <a href="{{ route('showprestasi', $item->id) }}">selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
