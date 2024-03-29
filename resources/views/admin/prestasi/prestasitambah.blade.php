@extends('admin.app')
@section('content')
    <div class="container">
        <main>
            <div class="row g-5 bd">
                <div class="col-md-6 col-lg-12 bd">
                    <h4 class="mb-3">Tambah Prestasi</h4>
                    <form method="POST" action="{{ route('prestasi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="nama_kegiatan"
                                    @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan') }}">
                                @error('nama_kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                                <input type="text" class="form-control" name="jenis_kegiatan"
                                    @error('jenis_kegiatan') is-invalid @enderror" value="{{ old('jenis_kegiatan') }}">
                                @error('jenis_kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Partisipasi</label>
                                <input type="text" class="form-control" name="partisipasi"
                                    @error('partisipasi') is-invalid @enderror" value="{{ old('partisipasi') }}">
                                @error('partisipasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" name="deskripsi"
                                    @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}"></textarea>
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Penyelenggara</label>
                                <input type="text" class="form-control" name="penyelenggara"
                                    @error('penyelenggara') is-invalid @enderror" value="{{ old('penyelenggara') }}">
                                @error('penyelenggara')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Waktu</label>
                                <input type="date" class="form-control" name="waktu"
                                    @error('waktu') is-invalid @enderror" value="{{ old('waktu') }}">
                                @error('waktu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Tempat</label>
                                <input type="text" class="form-control" name="tempat"
                                    @error('tempat') is-invalid @enderror" value="{{ old('tempat') }}">
                                @error('tempat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="">Kepengurusan</label>
                                    <select class="form-select" name="kepengurusan_id" aria-label="Default select example">
                                        @foreach ($kepengurusan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="name">sertifikat</div>
                                <div class="value">
                                    <input type="file" name="sertifikat" @error('sertifikat') is-invalid @enderror"
                                        value="{{ old('sertifikat') }}">
                                    @error('sertifikat')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="label--desc">Pastikan media yang diunggah berupa file pdf</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5 mt-5">
                            <div class="d-grid gap-2 d-md-flex justify-content">
                                <a button class="btn btn-dark" href="/kelola">Batal</button></a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
