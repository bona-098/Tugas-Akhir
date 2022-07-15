@extends('admin.app')
@section('content')
<style>
.border {
    border: 2px;
}
</style>
@if (count($errors)>0)
    <div class="alert alert-danger">
        <strong>sorry?</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-10">
            <h4 class="text-danger">Edit Teknisi</h4>
        </div>
        {{-- <div class="col-lg-2 text-right d-flex flex-column justify-content-center end-0">
            <button type="button" class="btn btn-primary position-absolute top-0 end-0">Save</button>
        </div> --}}
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin-dokumentasi.update', $dokumentasi->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('patch')
                        <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="nama" value="{{ $dokumentasi->nama }}">
                            <br>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Waktu</label>
                            <input class="form-control" type="date" name="waktu" value="{{ $dokumentasi->waktu }}">
                            <br>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Deskripsi</label>
                            <input class="form-control" type="text" name="deskripsi" value="{{ $dokumentasi->deskripsi }}">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                <a class="card-profile-image mt-4" href="{{asset('images/dokumentasi/'. $dokumentasi->foto)}}" target="_blank">
                                    <img id="preview-image" src="{{asset('images/dokumentasi/'.$dokumentasi->foto)}}" />
                                </a>
                            <div class="value">
                                <input type="file" name="media">
                                <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB</div>
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
@endsection