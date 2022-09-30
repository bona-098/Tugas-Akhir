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
                    <form method="POST" action="{{ route('proker.store') }}" enctype="multipart/form-data">
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
                                <label for="penanggung_jawab" class="form-label">penanggung_jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab"
                                    @error('penanggung_jawab') is-invalid @enderror" value="{{ old('penanggung_jawab') }}">
                                @error('penanggung_jawab')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="pengurus" class="form-label">pengurus</label>
                                <input type="text" class="form-control" name="pengurus"
                                    @error('pengurus') is-invalid @enderror" value="{{ old('pengurus') }}">
                                @error('pengurus')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="landasan_kegiatan" class="form-label">landasan_kegiatan</label>
                                <input type="text" class="form-control" name="landasan_kegiatan"
                                    @error('landasan_kegiatan') is-invalid @enderror"
                                    value="{{ old('landasan_kegiatan') }}">
                                @error('landasan_kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="tujuan_kegiatan" class="form-label">tujuan_kegiatan</label>
                                <input type="text" class="form-control" name="tujuan_kegiatan"
                                    @error('tujuan_kegiatan') is-invalid @enderror" value="{{ old('tujuan_kegiatan') }}">
                                @error('tujuan_kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="objek_segmentasi" class="form-label">objek_segmentasi</label>
                                <input type="text" class="form-control" name="objek_segmentasi"
                                    @error('objek_segmentasi') is-invalid @enderror" value="{{ old('objek_segmentasi') }}">
                                @error('objek_segmentasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="deskripsi" class="form-label">deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi"
                                    @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}">
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="parameter_keberhasilan" class="form-label">parameter_keberhasilan</label>
                                <input type="text" class="form-control" name="parameter_keberhasilan"
                                    @error('parameter_keberhasilan') is-invalid @enderror"
                                    value="{{ old('parameter_keberhasilan') }}">
                                @error('parameter_keberhasilan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="kebutuhan_dana" class="form-label">kebutuhan_dana</label>
                                <input type="text" class="form-control" name="kebutuhan_dana"
                                    @error('kebutuhan_dana') is-invalid @enderror" value="{{ old('kebutuhan_dana') }}">
                                @error('kebutuhan_dana')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="sumber_dana" class="form-label">sumber_dana</label>
                                <input type="text" class="form-control" name="sumber_dana"
                                    @error('sumber_dana') is-invalid @enderror" value="{{ old('sumber_dana') }}">
                                @error('sumber_dana')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="jumlah_sdm" class="form-label">jumlah_sdm</label>
                                <input type="text" class="form-control" name="jumlah_sdm"
                                    @error('jumlah_sdm') is-invalid @enderror" value="{{ old('jumlah_sdm') }}">
                                @error('jumlah_sdm')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="kebutuhan_lain" class="form-label">kebutuhan_lain</label>
                                <input type="text" class="form-control" name="kebutuhan_lain"
                                    @error('kebutuhan_lain') is-invalid @enderror" value="{{ old('kebutuhan_lain') }}">
                                @error('kebutuhan_lain')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="name">Pilih Divisi</div>
                                <div class="value">
                                    <select class="form-select" name="divisi_id" aria-label="Default select example">
                                        @foreach ($divisi as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="name">Pilih kepengurusan</div>
                                <div class="value">
                                    <select class="form-select" name="kepengurusan_id" aria-label="Default select example">
                                        @foreach ($kepengurusan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
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
