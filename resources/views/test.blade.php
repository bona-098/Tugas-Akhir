


!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
@extends('user.app')
@section('content')
<body>
    <section class="pb-4">
        <div class="bg-white border rounded-5">

            <section class="w-100 px-4 py-5">
                <style>
                    @media (min-width: 1025px) {
                        .h-custom {
                            height: 100vh !important;
                        }
                    }
                </style>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="card rounded-3">
                            {{-- <img src="{{ asset('assets/img/cutlogo.jpg') }}"
                                class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                                alt="Sample photo"> --}}
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                                <form class="px-md-2">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Name</label>
                                                <input type="text" id="form3Example1q" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Nim</label>
                                                <input type="string" id="form3Example1q" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Prodi</label>
                                                <input type="text" id="form3Example1q" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Kontak</label>
                                                <input type="number" id="form3Example1q" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="name">Resume</div>
                                            <div class="value">
                                                <input type="file" name="resume"
                                                    @error('resume') is-invalid @enderror" value="#">
                                                <div class="label--desc">Upload your Resume with pdf format. Max file
                                                    size 1 MB</div>
                                            </div>
                                            
                                        </div>
                                        <div class="col">
                                            <div class="name">Resume</div>
                                            <div class="value">
                                                <input type="file" name="resume"
                                                    @error('resume') is-invalid @enderror" value="#">
                                                <div class="label--desc">Upload your Resume with pdf format. Max file
                                                    size 1 MB</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="name">Resume</div>
                                            <div class="value">
                                                <input type="file" name="resume"
                                                    @error('resume') is-invalid @enderror" value="#">
                                                <div class="label--desc">Upload your Resume with pdf format. Max file
                                                    size 1 MB</div>
                                            </div>
                                            
                                        </div>
                                        <div class="col">
                                            <div class="name">Resume</div>
                                            <div class="value">
                                                <input type="file" name="resume"
                                                    @error('resume') is-invalid @enderror" value="#">
                                                <div class="label--desc">Upload your Resume with pdf format. Max file
                                                    size 1 MB</div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </section>
</body>
@endsection
</html>


@extends('user.app')
@section('content')
    <link href="{{ asset('colorlib-regform-6/css/main.css') }}" rel="stylesheet" media="all">

    <body>
        <div class="page-wrapper bg-transparent p-t-130 p-b-50">
            <div class="wrapper wrapper--w900">
                <div class="card card-6">
                    <div class="card-heading">
                        <h2 class="title text-center">Pendaftaran Anggota SAA</h2>
                        <div class="alert"></div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="name">Bidang Minat</div>
                                <div class="value">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">HRD</option>
                                        <option value="2">ORG</option>
                                        <option value="3">Umum</option>
                                        <option value="4">KWU</option>
                                        <option value="5">Karsa Cipta (PKM-KC)</option>
                                        <option value="6">Futuristik Konstruktif</option>
                                        <option value="7">Gagasan Tertulis</option>
                                        <option value="8">Artikel Ilmiah (PKM-AI)</option> on
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Nama</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="nama"
                                        @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Nim</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="nim"
                                        @error('nim') is-invalid @enderror" value="{{ old('nim') }}">
                                    @error('nim')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Prodi</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="prodi"
                                        @error('prodi') is-invalid @enderror" value="{{ old('prodi') }}">
                                    @error('prodi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">No.telp</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="no_telp" placeholder="08xxxxxxx"
                                        @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}">
                                    @error('no_telp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Resume</div>
                                <div class="value">
                                    <input type="file" name="resume" @error('resume') is-invalid @enderror"
                                        value="{{ old('resume') }}">
                                    @error('resume')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="resume">
                                    <label class="label--file" for="file">Choose file</label>
                                </div> --}}
                                    <div class="label--desc">Upload your Resume with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Transkip</div>
                                <div class="value">
                                    <input type="file" name="transkip" @error('transkip') is-invalid @enderror"
                                        value="{{ old('transkip') }}">
                                    @error('transkip')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="transkip" id="file"> --}}
                                    {{-- <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span> --}}
                                    {{-- </div> --}}
                                    <div class="label--desc">Upload your transkip with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Surat Rekomendasi</div>
                                <div class="value">
                                    <input type="file" name="surat_rekomendasi"
                                        @error('surat_rekomendasi') is-invalid @enderror"
                                        value="{{ old('surat_rekomendasi') }}">
                                    @error('surat_rekomendasi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="surat_rekomendasi" id="file">
                                    {{-- <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span> --}}
                                    {{-- </div> --}}
                                    <div class="label--desc">Upload your SK with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">sertifikat</div>
                                <div class="value">
                                    <input type="file" name="sertifikat" @error('sertifikat') is-invalid @enderror"
                                        value="{{ old('sertifikat') }}">
                                    @error('sertifikat')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="sertifikat" id="file">
                                    {{-- <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span> --}}
                                    {{-- </div> --}}
                                    <div class="label--desc">Upload your SK with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="colorlib-regform-6/vendor/jquery/jquery.min.js"></script>
        <script src="colorlib-regform-6/vendor/jquery/jquery.js"></script>

        <!-- Main JS-->
        <script src="colorlib-regform6/js/global.js"></script>

    </body>
@endsection