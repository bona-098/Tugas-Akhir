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
                <h4 class="text-danger">Edit Anggota</h4>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin-anggota.update', $anggota->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama" value="{{ $anggota->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Nim</label>
                                    <input class="form-control" type="text" name="nim" value="{{ $anggota->nim }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Prodi</label>
                                    <input class="form-control" type="text" name="prodi"
                                        value="{{ $anggota->prodi }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>No telp</label>
                                    <input class="form-control" type="number" name="no_telp"
                                        value="{{ $anggota->no_telp }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>resume</label>
                                    <input class="form-control" type="text" name="resume"
                                        value="{{ $anggota->resume }}">
                                </div>                                
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('pendaftaran/resume/' . $anggota->resume) }}" target="_blank">
                                            <img id="preview-image" src="{{ asset('pendaftaran/resume/' . $anggota->resume) }}"
                                                height="120px" width="120px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="foto" id="foto">
                                            <div class="label--desc">Ubah Surat Rekomendasi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('pendaftaran/transkrip/' . $anggota->transkrip) }}" target="_blank">
                                            <img id="preview-image" src="{{ asset('pendaftaran/transkrip/' . $anggota->transkrip) }}"
                                                height="120px" width="120px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="foto" id="foto">
                                            <div class="label--desc">Ubah Surat Rekomendasi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('pendaftaran/surat_rekomendasi/' . $anggota->surat_rekomendasi) }}" target="_blank">
                                            <img id="preview-image" src="{{ asset('pendaftaran/surat_rekomendasi/' . $anggota->surat_rekomendasi) }}"
                                                height="120px" width="120px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="foto" id="foto">
                                            <div class="label--desc">Ubah Surat Rekomendasi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('pendaftaran/sertifikat/' . $anggota->sertifikat) }}" target="_blank">
                                            <img id="preview-image" src="{{ asset('pendaftaran/sertifikat/' . $anggota->sertifikat) }}"
                                                height="120px" width="120px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="foto" id="foto">
                                            <div class="label--desc">Ubah Sertifikat</div>
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
