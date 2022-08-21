@extends('admin.app')
@section('content')
    <style>
        .border {
            border: 2px;
        }
    </style>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Dokumentasi</h5>
                        <br>
                        <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>waktu</label>
                                    <input class="form-control" type="date" name="waktu">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>deskripsi</label>
                                    <input class="form-control" type="text" name="deskripsi">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <div class="name">media</div>
                                        <div class="value">
                                            <input type="file" name="media">
                                            <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
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
