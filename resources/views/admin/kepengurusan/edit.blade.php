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
                        <h4 class="row mb-3 ml-2">Edit Kepengurusan</h4>
                        <form action="{{ route('kepengurusan.update', $kepengurusan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama kepengurusan</label>
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $kepengurusan->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Tahun</label>
                                    <input class="form-control" type="text" name="tahun"
                                        value="{{ $kepengurusan->tahun }}">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Pembina</label>
                                    <input class="form-control" type="text" name="pembina"
                                        value="{{ $kepengurusan->pembina }}">
                                        <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Ketua</label>
                                    <input class="form-control" type="text" name="ketua"
                                        value="{{ $kepengurusan->ketua }}">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Wakil internal</label>
                                    <input class="form-control" type="text" name="internal"
                                        value="{{ $kepengurusan->internal }}">
                                        <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Wakil eksternal</label>
                                    <input class="form-control" type="text" name="external"
                                        value="{{ $kepengurusan->external }}">
                                </div>
                                
                                <div class="col-12 col-sm-6">
                                    <label>Sekretaris</label>
                                    <input class="form-control" type="text" name="sekretaris"
                                        value="{{ $kepengurusan->sekretaris }}">
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
    @endsection
