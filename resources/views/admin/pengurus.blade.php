{{-- <link href="colorlib-regform-6/css/main.css" rel="stylesheet" media="all">
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
                                <input class="input--style-6" type="text" name="nama" @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
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
                                <input class="input--style-6" type="text" name="nim" @error('nim') is-invalid @enderror" value="{{ old('nim') }}">
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
                                <input class="input--style-6" type="text" name="pencapaian" @error('pencapaian') is-invalid @enderror" value="{{ old('pencapaian') }}">
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
                                <input class="input--style-6" type="text" name="dospem" @error('dospem') is-invalid @enderror" value="{{ old('dospem') }}">
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
                                <input class="input--style-6" type="text" name="kategori" @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}">
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
                                <input class="input--style-6" type="text" name="nama_kegiatan" @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan') }}">
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
                                <input class="input--style-6" type="text" name="penyelenggara" @error('penyelenggara') is-invalid @enderror" value="{{ old('penyelenggara') }}">
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
                                <input class="input--style-6" type="date" name="waktu" @error('waktu') is-invalid @enderror" value="{{ old('dospem') }}">
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
                                <input class="input--style-6" type="text" name="tempat" @error('tempat') is-invalid @enderror" value="{{ old('dospem') }}">
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
                                <input type="file" name="foto" @error('foto') is-invalid @enderror" value="{{ old('foto') }}">
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

</body> --}}