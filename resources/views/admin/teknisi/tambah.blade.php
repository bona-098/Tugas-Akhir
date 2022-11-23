@extends('admin.app')
@section('content')
    <div class="container mb-5">
        <main>
            <div class="row g-5 bd">
                <div class="col-md-6 col-lg-12 bd">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Tambah Teknisi</h4>
                            <form method="POST" action="{{ route('teknisi.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-outline mb-4">
                                            <label>Pilih Teknisi</label>
                                            <select name="user_id" class="form-control">
                                                @foreach ($user->where('role', 'teknisi') as $u)
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
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
                                        <div class="form-group">
                                            <label>Pilih Hari</label>
                                            <select name="hari" class="form-control" id="hari">
                                                <option value="" selected disabled>Pilih Hari</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">No. Hp</label>
                                        <input type="text" class="form-control" name="no_hp"
                                            @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                            <div class="label--desc">Upload file gambar</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2 mb-5 mt-5 ml-2">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                        <button class="btn btn-primary" type="submit">Submit</button>
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
