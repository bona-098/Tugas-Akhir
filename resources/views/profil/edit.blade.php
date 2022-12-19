@extends('user.app')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card mb-2">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ auth()->user()->name }}</h5>
                                <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                                <p class="text-muted mb-4">{{ auth()->user()->role }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a button href="/profil" class="btn btn-outline-primary ms-1">Batal</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-7">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <label for="Judul" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Masukkan Nama " required value="{{ $profil->name }}">
                                        <div class="text-danger">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label for="Judul" class="col-sm-2 col-form-label">Email </label>
                                    <div class="col-sm-10">
                                        <input type="text" id="email" name="email" class="form-control "
                                            placeholder="Masukkan Email" required
                                            value="{{ old('email', Auth::user()->email) }}">
                                        <div class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label for="Judul" class="col-sm-2 col-form-label"> Current password
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="password" id="current_password" name="current_password"
                                            class="form-control " placeholder="Masukkan Password">
                                        <div class="text-danger">
                                            @error('currentss_password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">

                                    <label for="Judul" class="col-sm-2 col-form-label"> New password </label>
                                    <div class="col-sm-10">
                                        <input type="password" id="new_password" name="new_password" class="form-control "
                                            placeholder="Masukkan Password">
                                        <div class="text-danger">
                                            @error('new_password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label for="Judul" class="col-sm-2 col-form-label"> Confirm password
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control " placeholder="Masukkan Password">
                                        <div class="text-danger">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection
