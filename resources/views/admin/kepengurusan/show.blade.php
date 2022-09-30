@extends('admin.app')
@section('content')
    <section id="mc-profile" class="section">
        <div class="container">
            <div class="has-text-centered">
                <h3 class="is-size-3 is-uppercase has-text-dark">{{ $kepengurusan->nama }}</h3>
            </div>
            <form action="{{ route('kepengurusan.show', $kepengurusan->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('patch')
                <br>    
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">kepengurusan</p>
                            <p class="subtitle is-size-5">{{ $kepengurusan->nama }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Kepala kepengurusan</p>
                            <p class="subtitle is-size-5">{{ $kepengurusan->tahun }}</p>
                        </span>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Staff Ahli</p>
                            <p class="subtitle is-size-5">{{ $kepengurusan->pembina }}</p>
                        </span>
                    </div>
                    <div class="col-4">
                        <p class="title is-semibolded is-size-6 has-text-grey">prestasi</p>
                            @foreach ($prestasi as $item)
                            <p>{{ $item->nama }}</p>                            
                            @endforeach
                    </div>
                    <div class="col-4"> 
                        <p class="title is-semibolded is-size-6 has-text-grey">Program kerja</p>
                            @foreach ($programkerja as $item)
                            <p>{{ $item->nama }}</p>                            
                            @endforeach
                    </div>

                </div>
            </form>
        </div>
        <br>
    </section>
@endsection