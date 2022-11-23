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
                        <h4 class="mb-5" >Edit Dokumentasi</h4>
                        <form action="{{ route('dokumentasi.update', $dokumentasi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $dokumentasi->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>waktu</label>
                                    <input class="form-control" type="date" name="waktu"
                                        value="{{ $dokumentasi->waktu }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>deskripsi</label>
                                    <input class="form-control" type="text" name="deskripsi"
                                        value="{{ $dokumentasi->deskripsi }}">
                                    <br>
                                </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('images/dokumentasi/' . $dokumentasi->media) }}" target="_blank">
                                            <img id="preview-image"
                                                src="{{ asset('images/dokumentasi/' . $dokumentasi->media) }}" height="120px"
                                                width="120px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="media" id="media">
                                            <div class="label--desc">Upload your media with pdf format. Max file size 50
                                                MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 mb-5 mt-5 ml-2">
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a button class="btn btn-dark" href="{{ URL::previous() }}">Batal</button></a>
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
            $('#foto').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    @endsection
