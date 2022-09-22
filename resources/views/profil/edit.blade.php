<!doctype html>
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
