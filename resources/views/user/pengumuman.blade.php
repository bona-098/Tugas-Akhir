@extends('user.app')
@section('content')
    <div class="container mt-sm-5 mt-3">
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
                            <a href="/detail-pengumuman-user">
                                {{-- <div class="card shadow-lg move-on-hover min-height-160 min-height-160">
                  <img class="w-100 my-auto" src="{{ asset('prestasi/foto/' .$item->foto) }}" alt="hero">
                </div> --}}
                                <div class="mt-2 ms-2">
                                    <h6 class="mb-0">{{ $item->judul }}</h6>
                                    <p class="text-secondary text-sm">{{ $item->deskripsi }}</p>
                                    <p class="text-secondary text-sm">{{ $item->waktu }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
