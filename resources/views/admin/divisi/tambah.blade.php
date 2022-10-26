@extends('admin.app')
@section('content')
    <style>
        .bd {
            border: 2px;
        }
    </style>
    <div class="container bd">
        <main>
            <div class="row g-5 bd">
                <div class="col-md-6 col-lg-12 bd">
                    <h4 class="mb-3">Tambah Divisi</h4>
                    <form method="POST" action="{{ route('divisi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="nama" class="form-label">nama</label>
                                <input type="text" class="form-control" name="nama"
                                    @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="kadiv" class="form-label">kadiv</label>
                                <input type="text" class="form-control" name="kadiv"
                                    @error('kadiv') is-invalid @enderror" value="{{ old('kadiv') }}">
                                @error('kadiv')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="staffahli" class="form-label">staffahli</label>
                                <input type="text" class="form-control" name="staffahli"
                                    @error('staffahli') is-invalid @enderror" value="{{ old('staffahli') }}">
                                @error('staffahli')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="staff" class="form-label">staff</label>
                                <input type="staff" class="form-control" name="staff"
                                    @error('staff') is-invalid @enderror" value="{{ old('staff') }}">
                                @error('landasan_kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="visi" class="form-label">visi</label>
                                <input type="text" class="form-control" name="visi"
                                    @error('visi') is-invalid @enderror" value="{{ old('visi') }}">
                                @error('visi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="misi" class="form-label">misi</label>
                                <input type="text" class="form-control" name="misi"
                                    @error('misi') is-invalid @enderror" value="{{ old('misi') }}">
                                @error('misi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
