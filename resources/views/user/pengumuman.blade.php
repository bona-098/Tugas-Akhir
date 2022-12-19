@extends('user.app')
@section('content')
<section>
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="position-sticky pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2" style="top: 100px">
                    <h3>Pengumuman SAA</h3>
                    <h6 class="text-secondary font-weight-normal pe-3">Berikut ini merupakan pengumuman terkait SAA</h6>
                </div>
            </div>
        </div>
        <div>
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($pengumuman as $item)
                        <div class="col-md-4 mt-md-0">
                            {{-- <div class="card shadow-lg move-on-hover">
                                <img class="w-100 my-auto" src="{{ asset('images/pengumuman/' .$item->media) }}" alt="hero" width="100" height="100">
                            </div> --}}
                            <div class="member-info">
                                <h4>{{ $item->judul }}</h4>
                                <p>{{ $item->deskripsi }}</p>
                                <p>{{ $item->waktu }}</p>
                                <div class="social">
                                    <a href="{{ route('showpengumuman', $item->id) }}">selengkapnya</a>
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
