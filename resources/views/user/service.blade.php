@extends('user.app')
@section('content')
    {{-- <style>
    border {
        border: 1px;
    }
</style> --}}
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Silahkan isi form dibawah ini untuk melakukan booking jadwal servis
                        </h5>
                        <br>
                        <form action="{{ route('userservicestore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Nim</label>
                                    <input class="form-control" type="text" name="nim">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Hari</label>
                                    <input class="form-control" type="date" name="hari">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>no_hp</label>
                                    <input class="form-control" type="text" name="no_hp">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Sesi</label>
                                    <select class="form-control" name="sesi">
                                        <option selected value="">Sesi</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <div class="name">KTM / KTP</div>
                                        <div class="value">
                                            <input type="file" name="foto">
                                            <div class="label--desc">Upload your foto with jpg, jpeg format. Max file size 50 MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type="submit">Booking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="row">
                        <div class="card text-start" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nama : Bona A. Matanari</li>
                                <li class="list-group-item">Nim : 1181019</li>
                                <li class="list-group-item">Hari : selasa</li>
                                <li class="list-group-item">Sesi : 4</li>
                            </ul>
                            <div class="card-footer">
                        Card footer
                        </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <h2 class="list-group-item">An item</h2>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
