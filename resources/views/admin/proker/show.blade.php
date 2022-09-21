@extends('admin.app')
@section('content')
    <style>
        .title {
            font-size: large;
        }
    </style>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>sorry?</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section id="mc-profile" class="section">
        <div class="container">
            <div class="has-text-centered">
                <h3 class="is-size-3 is-uppercase has-text-dark">{{ $proker->nama }}</h3>
            </div>
            <form action="{{ route('proker.show', $proker->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('patch')
                <br>
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">nama</p>
                            <p class="subtitle is-size-5">{{ $proker->nama }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">penanggung jawab</p>
                            <p class="subtitle is-size-5">{{ $proker->penanggung_jawab }}</p>
                        </span>
                        <br>
                        <span>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">pengurus</p>
                            <p class="subtitle is-size-5">{{ $proker->pengurus }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">landasan_kegiatan</p>
                            <p class="subtitle is-size-5">{{ $proker->landasan_kegiatan }}</p>
                        </span>                   
                            <p class="title is-semibolded is-size-6 has-text-grey">objek_segmentasi</p>
                            <p class="subtitle is-size-5">{{ $proker->objek_segmentasi }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">deskripsi</p>
                            <p class="subtitle is-size-5">{{ $proker->deskripsi }}</p>
                        </span>
                    </div>
                    <div class="col-4">
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">parameter_keberhasilan</p>
                            <p class="subtitle is-size-5">{{ $proker->parameter_keberhasilan }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">tujuan_kegiatan</p>
                            <p class="subtitle is-size-5">{{ $proker->tujuan_kegiatan }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">kebutuhan_dana</p>
                            <p class="subtitle is-size-5">{{ $proker->kebutuhan_dana }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">sumber_dana</p>
                            <p class="subtitle is-size-5">{{ $proker->sumber_dana }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">jumlah_sdm</p>
                            <p class="subtitle is-size-5">{{ $proker->jumlah_sdm }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">kebutuhan_lain</p>
                            <p class="subtitle is-size-5">{{ $proker->kebutuhan_lain }}</p>
                        </span>
                        <br>
                    </div>
                </div>
                <br>
                {{-- <div class="columns is-centered is-multiline" id="my-courses">
                                        <div class="column is-9">
                                            <h3 class="is-size-3 is-uppercase has-text-dark title">Riwayat Janji</h3>
                                        </div>
                                        @foreach ($campuran as $item)
                                        <div class="column is-8" style="border: 1px solid lightgrey; border-radius: 3px; margin-bottom: 15px;">
                                            <div class="columns">						
                                                <div class="column">							
                                                        <a href="#" class="is-semibolded is-size-4">{{$item->nama_psikolog}}</a>
                                                        <br>
                                                        <p>{{$item->jadwal_psikolog}}</p>									
                                                </div>		
                                                
                                                @if ($item->status == 'Proses')
                                                <div class="column is-3 has-text-centered">
                                                    <p class="has-background-warning">Proses</p>
                                                </div>
                                                @elseif ($item->status == 'Tolak')
                                                <div class="column is-3 has-text-centered">
                                                    <p class="has-background-danger">Tertolak</p>
                                                </div>
                                                @else					
                                                <div class="column is-3 has-text-centered">
                                                    <p class="has-background-primary has-text-light">Diterima</p>
                                                </div>
                                                @endif
                                
                                            </div>
                                        </div>
                                        @endforeach	
                                    </div> --}}
        </div>
    </section>
    </form>
@endsection
