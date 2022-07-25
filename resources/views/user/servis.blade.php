{{-- @extends('user.app')
@section('content')
<style>
    border {
        border: 1px;
    }
</style>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-12 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Silahkan isi form dibawah ini untuk melakukan booking jadwal servis</h5>
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
                                <div class="name">Foto</div>
                            <div class="value">
                                <input type="file" name="foto">
                                <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB</div>
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
            </div>
        </div>
    </div>
</div>
@endsection --}}
