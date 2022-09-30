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
                    <h4 class="mb-3">Tambah Prestasi</h4>
                    <form method="POST" action="{{ route('prestasi.store') }}" enctype="multipart/form-data">
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
                                <label for="nim" class="form-label">nim</label>
                                <input type="number" class="form-control" name="nim"
                                    @error('nim') is-invalid @enderror" value="{{ old('nim') }}">
                                @error('nim')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">dospem</label>
                                <input type="text" class="form-control" name="dospem"
                                    @error('dospem') is-invalid @enderror" value="{{ old('dospem') }}">
                                @error('dospem')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">waktu</label>
                                <input type="date" class="form-control" name="waktu"
                                    @error('waktu') is-invalid @enderror" value="{{ old('dospem') }}">
                                @error('waktu')
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
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control" id="kategori">
                                        <option value="" selected disabled>Pilih kategori</option>
                                        <option value="Lomba">Lomba</option>
                                        <option value="Webinar">Webinar</option>
                                        <option value="Peraih Penghargaan">Peraih Penghargaan</option>
                                        <option value="Peraih Nominasi">Peraih Nominasi</option>
                                        <option value="Dll">Dll</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pencapaian</label>
                                    <select name="pencapaian" class="form-control" id="pencapaian">
                                        <option value="" selected disabled>Pilih pencapaian</option>
                                        <option value="Juara 1">Juara 1</option>
                                        <option value="Juara 2">Juara 2</option>
                                        <option value="Juara 3">Juara 3</option>
                                        <option value="Juara Harapan">Juara Harapan</option>
                                        <option value="Peserta">Peserta</option>
                                        <option value="Guest Star">Guest Star</option>
                                        <option value="Dll">Dll</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="nama_kegiatan" @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan') }}">
                                @error('nama_kegiatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="name">Pilih Kepengurusan</div>
                                <div class="value">
                                    <select class="form-select" name="kepengurusan_id" aria-label="Default select example">
                                        @foreach ($kepengurusan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="name">Foto</div>
                                <div class="value">
                                    <input type="file" name="foto" @error('foto') is-invalid @enderror"
                                        value="{{ old('foto') }}">
                                    @error('foto')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="label--desc">Pastikan media yang diunggah berupa file gambar</div>
                                </div>
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
