@extends('admin.app')
@section('content')
    <style>
        .border {
            border: 2px;
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-10">
                <h4 class="text-danger">Edit Prestasi</h4>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>nama_kegiatan</label>
                                    <input class="form-control" type="text" name="nama_kegiatan"
                                        value="{{ $prestasi->nama_kegiatan }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>jenis_kegiatan</label>
                                    <input class="form-control" type="text" name="jenis_kegiatan"
                                        value="{{ $prestasi->jenis_kegiatan }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>partisipasi</label>
                                    <input class="form-control" type="text" name="partisipasi"
                                        value="{{ $prestasi->partisipasi }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>deskripsi</label>
                                    <input class="form-control" type="text" name="deskripsi"
                                        value="{{ $prestasi->deskripsi }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>penyelenggara</label>
                                    <input class="form-control" type="text" name="penyelenggara"
                                        value="{{ $prestasi->penyelenggara }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>waktu</label>
                                    <input class="form-control" type="date" name="waktu"
                                        value="{{ $prestasi->waktu }}">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>tempat</label>
                                        <input class="form-control" type="text" name="tempat"
                                            value="{{ $prestasi->tempat }}">
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('images/prestasi/' . $prestasi->sertifikat) }}" target="_blank">
                                            <a href="{{ asset('images/prestasi/' . $prestasi->sertifikat) }}"
                                                height="120px" width="120px">
                                            </a>
                                            <div class="value">
                                                <input type="file" name="sertifikat" id="sertifikat">
                                                <div class="label--desc">Upload your media with pdf format. Max file size 50
                                                    MB
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a button class="btn btn-dark" href="/prestasi">Batal</button></a>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#sertifikat').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    @endsection
