@extends('admin.app')
@section('content')
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
                        <h4>Edit Pengumuman</h4>
                        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>judul</label>
                                    <input class="form-control" type="text" name="judul"
                                        value="{{ $pengumuman->judul }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>deskripsi</label>
                                    <input class="form-control" type="text" name="deskripsi"
                                        value="{{ $pengumuman->deskripsi }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>waktu</label>
                                    <input class="form-control" type="date" name="waktu"
                                        value="{{ $pengumuman->waktu }}">
                                </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('images/pengumuman/' . $pengumuman->media) }}" target="_blank"><br>
                                            <img id="preview-image" src="{{ asset('images/pengumuman/' . $pengumuman->media) }}"
                                                height="100px" width="100px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="media" id="media">
                                            <div class="label--desc">Upload your foto or file. Max file size 5 MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 mb-5 mt-5 ml-2">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <a button class="btn btn-dark" href="/pengumuman">Batal</button></a>
                                    <button class="btn btn-primary" type="submit">Edit</button>
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
