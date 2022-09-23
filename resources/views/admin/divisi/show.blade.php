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
                <h3 class="is-size-3 is-uppercase has-text-dark">{{ $divisi->nama }}</h3>
            </div>
            <form action="{{ route('divisi.show', $divisi->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('patch')
                <br>
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Divisi</p>
                            <p class="subtitle is-size-5">{{ $divisi->nama }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Kepala Divisi</p>
                            <p class="subtitle is-size-5">{{ $divisi->kadiv }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Staff Ahli</p>
                            <p class="subtitle is-size-5">{{ $divisi->staffahli }}, {{ $divisi->staff }},
                                {{ $divisi->misi }}</p>
                        </span>
                    </div>
                    <div class="col-4">
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Staff</p>
                            <p class="subtitle is-size-5">{{ $divisi->staff }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Visi</p>
                            <p class="subtitle is-size-5">{{ $divisi->visi }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Misi</p>
                            <p class="subtitle is-size-5">{{ $divisi->misi }}</p>
                        </span>
                        <br>
                    </div>
                    <div class="col-4">
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">proker</p>
                            @foreach ($proker as $item)
                            <p>{{ $item->nama }}</p>                            
                            @endforeach
                        </span>
                        <br>                        
                        <span>
                            <a button type="button" class="btn btn-outline-dark" id="liveToastBtn"
                                href="{{ route('proker.create') }}">Tambah
                                Program kerja</a>
                        </span>
                    </div>
            </div>
            </form>
        </div>
        <br>
    </section>
@endsection

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
