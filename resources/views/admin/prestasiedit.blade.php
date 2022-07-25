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
            {{-- <div class="col-lg-2 text-right d-flex flex-column justify-content-center end-0">
            <button type="button" class="btn btn-primary position-absolute top-0 end-0">Save</button>
        </div> --}}
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin-prestasi.update', $prestasi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $prestasi->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Nim</label>
                                    <input class="form-control" type="text" name="nim"
                                        value="{{ $prestasi->nim }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Pencapaian</label>
                                    <input class="form-control" type="text" name="pencapaian"
                                        value="{{ $prestasi->pencapaian }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>dosen pembimbing</label>
                                    <input class="form-control" type="text" name="dospem"
                                        value="{{ $prestasi->dospem }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>kategori</label>
                                    <input class="form-control" type="text" name="kategori"
                                        value="{{ $prestasi->kategori }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>nama kegiatan</label>
                                    <input class="form-control" type="text" name="nama_kegiatan"
                                        value="{{ $prestasi->nama_kegiatan }}">
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
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>tempat</label>
                                    <input class="form-control" type="text" name="tempat"
                                        value="{{ $prestasi->tempat }}">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('prestasi/foto/' . $prestasi->foto) }}" target="_blank">
                                            <img id="preview-image" src="{{ asset('prestasi/foto/' . $prestasi->foto) }}"
                                                height="120px" width="120px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="foto">
                                            <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#foto').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    @endsection
