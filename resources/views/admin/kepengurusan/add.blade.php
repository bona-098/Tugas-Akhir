@extends('admin.app')
@section('content')
    <div class="container mb-5">
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Tambah Kepengurusan Baru</h5>
                        <br>
                        <form action="{{ route('kepengurusan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama Kepengurusan</label>
                                    <input class="form-control" type="text" name="nama">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Tahun</label>
                                    <input class="form-control" type="number" name="tahun">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Pembina</label>
                                    <input class="form-control" type="text" name="pembina">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Ketua</label>
                                    <input class="form-control" type="text" name="ketua">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Wakil internal</label>
                                    <input class="form-control" type="text" name="internal">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Wakil ekstenal</label>
                                    <input class="form-control" type="text" name="external">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Sekretaris</label>
                                    <input class="form-control" type="text" name="sekretaris">
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-2 mb-5 mt-5 ml-2"> --}}
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
