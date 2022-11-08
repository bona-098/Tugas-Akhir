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

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <a href="{{ route('profil.edit', $profil->id) }}" class="mx-3"
                    data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                    <i class="fas fa-user-edit text-secondary"></i>
                </a>
                <h2>{{ auth()->user()->name }}</h2>
                <p class="lead">{{ auth()->user()->email }}</p>
            </div>

            <div class="row g-5">
                <div class="col-4">
                    <h4 class="mb-3">Tentang saya</h4>
                    <div class="row justify-content-evenly">
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">Nama</p>
                            <p class="subtitle is-size-5">{{ $profil->name }}</p>
                        </span>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">email</p>
                            <p class="subtitle is-size-5">{{ $profil->email }}</p>
                        </span>
                    </div>
                </div>
                    <div class="col-4">
                        <br>
                        <br>
                        <span>
                            <p class="title is-semibolded is-size-6 has-text-grey">email</p>
                            <p class="subtitle is-size-5">{{ $profil->email }}</p>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Riwayat Servis</span>
                            <span class="badge bg-primary rounded-pill">Status</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach ($getservice as $lane)
                            {{-- @dd($lane); --}}
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $lane->nama }}</h6>
                                    <span class="text-muted">{{ $lane->hari }}</span>
                                </div>
                                <small class="text-muted">{{ $lane->status }}</small>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017–2021 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="form-validation.js"></script>
</body>

</html>
