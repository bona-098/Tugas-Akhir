{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profil</title>
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .title {
            font-size: large;
        }
    </style>
</head>

<body class="bglight">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 p-5 pt-2">
                        <!-- membuat form -->
                        <div class="container">
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h4 style="text-align:center"><b> EDIT profil </b></h4>
                                </div>
                                <div class="card-body">                                    
                                    <form action="{{ route('profil.update', $profil->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="form-group row">
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
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label">Email </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="email" name="email"
                                                    class="form-control " placeholder="Masukkan Email" required
                                                    value="{{ old('email', Auth::user()->email) }}">
                                                <div class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <span class="small text-danger">*Jika tidak mengganti password, harap
                                            dikosongkan</span>
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label"> Current password
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="password" id="current_password" name="current_password"
                                                    class="form-control " placeholder="Masukkan Password">
                                                <div class="text-danger">
                                                    @error('current_password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label"> New password </label>
                                            <div class="col-sm-10">
                                                <input type="password" id="new_password" name="new_password"
                                                    class="form-control " placeholder="Masukkan Password">
                                                <div class="text-danger">
                                                    @error('new_password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Judul" class="col-sm-2 col-form-label"> Confirm password
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" class="form-control "
                                                    placeholder="Masukkan Password">
                                                <div class="text-danger">
                                                    @error('password_confirmation')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card-footer text-muted">
                                            <button type="submit" class="btn btn-danger mb-3">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="form-validation.js"></script>
</body>

</html>
 --}}

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
                    {{-- <div class="col-lg-3">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Riwayat Servis</span>
                        <span class="badge bg-primary rounded-pill">Status</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($getservice as $lane)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $lane->nama }}</h6>
                                    <span class="text-muted">{{ $lane->hari }}</span>
                                </div>
                                <small class="text-muted">{{ $lane->status }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div> --}}
                </div>
            </form>
        </div>

    </section>
@endsection
