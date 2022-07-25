@extends('admin.app')
@section('content')
    {{-- <style>
.border {
    border: 2px;
}
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-10">
            <h4 class="text-danger">Tambahkan Prestasi</h4>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-lg-12 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Info</h5>
                    <form method="POST" action="{{ route('admin-prestasi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="name">ama</div>                                
                                <input class="form-control" type="text" name="nama" @error('nama') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
            
                            <div class="col-12 col-sm-6">                            
                                <div class="name">im</div>
                                <input class="form-control" type="text" name="nim" @error('nim') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('nim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="name">encapaian</div>
                                <input class="form-control" type="text" name="pencapaian" @error('pencapaian') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('pencapaian')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="name">ospem</div>
                                <input class="form-control" type="text" name="dospem" @error('dospem') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('dospem')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="name">ategori</div>
                                <input class="form-control" type="text" name="kategori" @error('kategori') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('kategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="name">enyelenggara</div>
                                <input class="form-control" type="text" name="penyelenggara" @error('penyelenggara') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('penyelenggara')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>
                            </div>                            
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="name">aktu</div>
                                <input class="form-control" type="date" name="waktu" @error('waktu') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('waktu')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>                            
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="name">empat</div>
                                <input class="form-control" type="text" name="tempat" @error('tempat') is-invalid @enderror" value="{{ old ('name') }}">
                                @error('tempat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="name">Foto</div>
                            <div class="value">
                                <input type="file" name="foto" @error('foto') is-invalid @enderror" value="{{ old('foto') }}">
                                @error('foto')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB</div>
                                <br>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <link href="{{ asset('colorlib-regform-6/css/main.css') }}" rel="stylesheet" media="all">

    <body>
        <div class="card card-6">
            <div class="card-heading">
                <h2 class="title text-center">Pendaftaran Prestasi SAA</h2>
                <div class="alert"></div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin-prestasi.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="name">Nama</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="nama" @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Nim</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="nim" @error('nim') is-invalid @enderror"
                                value="{{ old('nim') }}">
                            @error('nim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Pencapaian</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="pencapaian"
                                @error('pencapaian') is-invalid @enderror" value="{{ old('pencapaian') }}">
                            @error('pencapaian')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">dospem</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="dospem"
                                @error('dospem') is-invalid @enderror" value="{{ old('dospem') }}">
                            @error('dospem')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">kategori</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="kategori"
                                @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}">
                            @error('kategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Nama Kegiatan</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="nama_kegiatan"
                                @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan') }}">
                            @error('nama_kegiatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Penyelenggara</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="penyelenggara"
                                @error('penyelenggara') is-invalid @enderror" value="{{ old('penyelenggara') }}">
                            @error('penyelenggara')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">waktu</div>
                        <div class="value">
                            <input class="input--style-6" type="date" name="waktu"
                                @error('waktu') is-invalid @enderror" value="{{ old('dospem') }}">
                            @error('waktu')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Tempat</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="tempat"
                                @error('tempat') is-invalid @enderror" value="{{ old('dospem') }}">
                            @error('tempat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
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
            </div>
            <div class="card-footer">
                <button class="btn btn--radius-2 btn--blue-2" type="submit">Kirim</button>
            </div>
            </form>
        </div>
        <!-- Jquery JS-->
        <script src="colorlib-regform-6/vendor/jquery/jquery.min.js"></script>
        <script src="colorlib-regform-6/vendor/jquery/jquery.js"></script>

        <!-- Main JS-->
        <script src="colorlib-regform6/js/global.js"></script>
    </body>
@endsection
