<!DOCTYPE html>
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
        <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
            @csrf
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
                                            <input type="text" name="nama" id="form3Example1q" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example1q">Nim</label>
                                            <input type="string" name="nim" id="form3Example1q" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example1q">Prodi</label>
                                            <input type="text" name="prodi" id="form3Example1q" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example1q">Kontak</label>
                                            <input type="number" name="no_telp" id="form3Example1q" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="name">Resume</div>
                                        <div class="value">
                                            <input type="file" name="resume" @error('resume') is-invalid @enderror"
                                                value="#">
                                            <div class="label--desc">Upload your Resume with pdf format. Max file
                                                size 1 MB</div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="name">Transkip</div>
                                        <div class="value">
                                            <input type="file" name="transkip" @error('resume') is-invalid @enderror"
                                                value="#">
                                            <div class="label--desc">Upload your Resume with pdf format. Max file
                                                size 1 MB</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="name">Surat Rekomendasi</div>
                                        <div class="value">
                                            <input type="file" name="surat_rekomendasi"
                                                @error('resume') is-invalid @enderror" value="#">
                                            <div class="label--desc">Upload your Resume with pdf format. Max file
                                                size 1 MB</div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="name">Sertifikat</div>
                                        <div class="value">
                                            <input type="file" name="sertifikat" @error('resume') is-invalid @enderror"
                                                value="#">
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
        </form>

    </body>
@endsection

</html>
