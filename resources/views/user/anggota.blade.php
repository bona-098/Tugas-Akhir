{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</head> --}}
<title>Pendaftaran Anggota</title>
@extends('user.app')
@section('content')
    <style>
        .name {
            font-style: bold;
        }
    </style>
    <section>
        <div class="container py-5">
            <form method="POST" action="{{ route('anggota') }}" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="card rounded-3">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                                <form class="px-md-2">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Nama</label>
                                                <input type="text" name="nama" id="form3Example1q"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Nim</label>
                                                <input type="string" name="nim" id="form3Example1q"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label>Pilihan Pertama</label>
                                                <select name="pilihan_satu" class="form-control">
                                                    <option value="Divisi HRD">Divisi HRD</option>
                                                    <option value="Divisi ORG">Divisi ORG</option>
                                                    <option value="Divisi UMUM">Divisi UMUM</option>
                                                    <option value="Divisi MEDFO">Divisi MEDFO</option>
                                                    <option value="Divisi HUBLU">Divisi HUBLU</option>
                                                    <option value="Divisi KWU">Divisi KWU</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label>Pilihan Kedua</label>
                                                <select name="pilihan_dua" class="form-control">
                                                    <option value="Divisi HRD">Divisi HRD</option>
                                                    <option value="Divisi ORG">Divisi ORG</option>
                                                    <option value="Divisi UMUM">Divisi UMUM</option>
                                                    <option value="Divisi MEDFO">Divisi MEDFO</option>
                                                    <option value="Divisi HUBLU">Divisi HUBLU</option>
                                                    <option value="Divisi KWU">Divisi KWU</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Alasan pilihan
                                                    pertama</label>
                                                <textarea type="text" name="alasan_satu" id="form3Example1q" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Alasan pilihan kedua</label>
                                                <textarea type="text" name="alasan_dua" id="form3Example1q" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Apakah bersedia dipindahkan
                                                    ke
                                                    divisi lain ?</label>
                                                <select name="pindah_divisi" class="form-control" id="">
                                                    <option value="ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Motivasi</label>
                                                <textarea type="text" name="motivasi" id="form3Example1q" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Komitmen</label>
                                                <textarea type="text" name="komitmen" id="form3Example1q" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="name">CV</div>
                                            <div class="value">
                                                <input type="file" name="cv" @error('cv') is-invalid @enderror"
                                                    value="#">
                                                <div class="label--desc">Upload file pdf</div>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="name">Portofolio</div>
                                            <div class="value">
                                                <input type="file" name="porto" @error('porto') is-invalid @enderror"
                                                    value="#">
                                                <div class="label--desc">Upload file pdf</div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success btn-lg mb-1">Daftar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

</html>
