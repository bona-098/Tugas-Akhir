@extends('user.app')
@section('content')
@if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{ $item }}
            </div>
        @endforeach
    @endif

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            {{-- <li class="breadcrumb-item"><a href="#">User</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                            <p class="text-muted mb-4">{{ auth()->user()->role }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a button type="button" href="{{ route('profil.edit', $profil->id) }}" class="btn btn-primary">Edit info</button></a>
                                {{-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Riwayat Servis</span>
                        <span class="badge bg-primary rounded-pill">Status</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($getservice as $lane)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $lane->teknisi->user->name }}</h6>
                                    <span class="text-muted">{{ $lane->hari }}</span>
                                </div>
                                <small class="text-muted">{{ $lane->status }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
    </section>
@endsection