@extends('admin.app')
@section('content')
    <style>
        .border {
            border: 2px;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-10">
                <h4 class="text-danger">Edit Pengumuman</h4>
            </div>
            <div class="col-lg-2 text-right d-flex flex-column justify-content-center end-0">
                <button type="button" class="btn btn-primary position-absolute top-0 end-0">Save</button>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Info</h5>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label>Judul Pengumuman</label>
                                <input class="form-control" type="text">
                            </div>

                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label>Waktu Kegiatan</label>
                                <input class="form-control" type="date">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                <div class="name">Foto</div>
                                <div class="value">
                                    <input type="file" name="foto">
                                    <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
