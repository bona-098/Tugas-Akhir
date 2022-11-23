@extends('admin.app')
@section('content')
    <div class="container mb-5">
        <main>
            <div class="row g-5 bd">
                <div class="col-md-6 col-lg-12 bd">
                    <div class="card">
                        <div class="card-body">
                    <h4 class="mb-5">Tambah Divisi</h4>
                    <form method="POST" action="{{ route('divisi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="nama" class="form-label">Nama Divisi</label>
                                <input type="text" class="form-control" name="nama"
                                    @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <label for="kadiv" class="form-label">Kepala Divisi</label>
                                <input type="text" class="form-control" name="kadiv"
                                    @error('kadiv') is-invalid @enderror" value="{{ old('kadiv') }}">
                                @error('kadiv')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="visi" class="form-label">Visi</label>
                                <input type="text" class="form-control" name="visi"
                                    @error('visi') is-invalid @enderror" value="{{ old('visi') }}">
                                @error('visi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="misi" class="form-label">Misi</label>
                                <input type="text" class="form-control" name="misi"
                                    @error('misi') is-invalid @enderror" value="{{ old('misi') }}">
                                @error('misi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 mb-5 mt-5 ml-2">
                            <div class="d-grid gap-2 d-md-flex justify-content">
                                {{-- <a button class="btn btn-dark" href="/prestasi">Batal</button></a> --}}
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </main>
    </div>
@endsection
