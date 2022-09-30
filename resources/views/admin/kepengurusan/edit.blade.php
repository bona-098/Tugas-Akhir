@extends('admin.app')
@section('content')
    <style>
        .border {
            border: 2px;
        }
    </style>
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
        <div class="row">
            <div class="col-lg-10">
                <h4 class="text-danger">Edit Kepengurusan</h4>
            </div>
            {{-- <div class="col-lg-2 text-right d-flex flex-column justify-content-center end-0">
            <button type="button" class="btn btn-primary position-absolute top-0 end-0">Save</button>
        </div> --}}
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kepengurusan.update', $kepengurusan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>nama</label>
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $kepengurusan->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>tahun</label>
                                    <input class="form-control" type="text" name="tahun"
                                        value="{{ $kepengurusan->tahun }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>pembina</label>
                                    <input class="form-control" type="text" name="pembina"
                                        value="{{ $kepengurusan->pembina }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>bph</label>
                                    <input class="form-control" type="text" name="bph"
                                        value="{{ $kepengurusan->bph }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>pengurus_lain</label>
                                    <input class="form-control" type="text" name="pengurus_lain"
                                        value="{{ $kepengurusan->pengurus_lain }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>anggota</label>
                                    <input class="form-control" type="text" name="anggota"
                                        value="{{ $kepengurusan->anggota }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>program kerja</label>
                                    <input class="form-control" type="text" name="program_kerja"
                                        value="{{ $kepengurusan->program_kerja }}">
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
