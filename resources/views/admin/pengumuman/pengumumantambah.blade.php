<title>Tambah Pengumuman</title>
@extends('admin.app')
@section('content')
    <div class="container mb-5">
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Silahkan isi form untuk membuat pengumuman</h5>
                        <br>
                        <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Judul</label>
                                    <input class="form-control" type="text" name="judul">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mb-3 mt-sm-0">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" type="text-" name="deskripsi"></textarea>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Waktu</label>
                                    <input class="form-control" type="date" name="waktu">
                                    <br>
                                </div>
                                <div class="col-sm-6">
                                    <div class="name">Media</div>
                                    <div class="value">
                                        <input type="file" name="media" @error('media') is-invalid @enderror
                                            value="{{ old('media') }}">
                                        @error('media')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="label--desc">Pastikan media yang diunggah berupa file gambar</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
