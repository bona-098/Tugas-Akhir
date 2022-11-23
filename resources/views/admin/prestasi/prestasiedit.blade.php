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
                
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-5">Edit Prestasi</h4>
                        <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama Kegiatan</label>
                                    <input class="form-control" type="text" name="nama_kegiatan"
                                        value="{{ $prestasi->nama_kegiatan }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Jenis Kegiatan</label>
                                    <input class="form-control" type="text" name="jenis_kegiatan"
                                        value="{{ $prestasi->jenis_kegiatan }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Partisipasi</label>
                                    <input class="form-control" type="text" name="partisipasi"
                                        value="{{ $prestasi->partisipasi }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Deskripsi</label>
                                    <input class="form-control" type="text" name="deskripsi"
                                        value="{{ $prestasi->deskripsi }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Penyelenggara</label>
                                    <input class="form-control" type="text" name="penyelenggara"
                                        value="{{ $prestasi->penyelenggara }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Waktu</label>
                                    <input class="form-control" type="date" name="waktu"
                                        value="{{ $prestasi->waktu }}">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label>Tempat</label>
                                        <input class="form-control" type="text" name="tempat"
                                            value="{{ $prestasi->tempat }}">
                                        <br>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="as">sertifikat</label>
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('images/prestasi/' . $prestasi->sertifikat) }}" target="_blank">
                                            <a href="{{ asset('images/prestasi/' . $prestasi->sertifikat) }}"
                                                height="120px" width="120px">
                                            </a>
                                            <div class="value">
                                                <input type="file" name="sertifikat" id="sertifikat">
                                                <div class="label--desc">Upload Sertifikat Format PDF</div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2 mb-5 mt-5 ml-2">
                                <div class="d-grid gap-2 d-md-flex justify-content">
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
