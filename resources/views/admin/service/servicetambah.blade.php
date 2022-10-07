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
                    <h4 class="mb-3">Buat Jadwal Servis</h4>
                    <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
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
                                <label for="hari" class="form-label">Hari</label>
                                <input type="date" class="form-control" name="hari"
                                    @error('hari') is-invalid @enderror" value="{{ old('hari') }}">
                                @error('hari')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="pesan" class="form-label">pesan</label>
                                <input type="text" class="form-control" name="pesan"
                                    @error('pesan') is-invalid @enderror" value="{{ old('pesan') }}">
                                @error('pesan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="status" class="form-label">status</label>
                                <input type="text" class="form-control" name="status"
                                    @error('status') is-invalid @enderror" value="{{ old('status') }}">
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>                          
                            <div class="col-sm-6">
                                <label for="no_hp" class="form-label">No. Hp</label>
                                <input type="text" class="form-control" name="no_hp" @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>sesi</label>
                                    <select name="sesi" class="form-control" id="sesi">
                                        <option value="" selected disabled>Pilih sesi</option>
                                        <option value="1">Sesi 1</option>
                                        <option value="2">Sesi 2</option>
                                        <option value="3">Sesi 3</option>
                                        <option value="4">Sesi 4</option>
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
                                    <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="name">Pilih teknisi</div>
                                <div class="value">
                                    <select class="form-select" name="teknisi_id" aria-label="Default select example">
                                        @foreach ($teknisi as $item)
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
