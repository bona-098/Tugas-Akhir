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
                        <h5 class="font-weight-bolder">Form SPJ_LPJ</h5>
                        <br>
                        <form action="{{ route('kepengurusan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>nama</label>
                                    <input class="form-control" type="text" name="nama">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>tahun</label>
                                    <input class="form-control" type="text" name="tahun">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>pembina</label>
                                    <input class="form-control" type="text" name="pembina">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>bph</label>
                                    <input class="form-control" type="text" name="bph">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>pengurus lain</label>
                                    <input class="form-control" type="text" name="pengurus_lain">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>anggota</label>
                                    <input class="form-control" type="text" name="anggota">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>program kerja</label>
                                    <input class="form-control" type="text" name="program_kerja">
                                    <br>
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
