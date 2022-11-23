<title>Pendaftaran Anggota</title>
@extends('user.app')
@section('content')
    <section>
        <div class="container py-5">
            <form method="POST" action="{{ route('anggota') }}" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="card rounded-3">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
                                {{-- @if ($errors->any())
                                    @foreach ($errors->all() as $item)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $item }}
                                        </div>
                                    @endforeach
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif --}}
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                @if (session()->has('gagal'))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session()->get('gagal') }}
                                    </div>
                                @endif
                                <form class="px-md-2">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Nama</label>
                                                <input type="text" name="nama" id="form3Example1q"
                                                    class="form-control" @error('nama') is-invalid @enderror"
                                                    value="{{ old('nama') }}">
                                                @error('nama')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Nim</label>
                                                <input type="number" name="nim" id="form3Example1q"
                                                    class="form-control" @error('nim') is-invalid @enderror"
                                                    value="{{ old('nim') }}">
                                                @error('nim')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label>Pilihan Pertama</label>
                                                <select name="divisi_id" class="form-control">
                                                    <option value="">Pilih divisi...</option>
                                                    @foreach ($divisi as $div)
                                                        <option value="{{ $div->id }}">{{ $div->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pilihan_satu')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label>Pilihan Kedua</label>
                                                <select name="pilihan_dua" class="form-control">
                                                    <option value="">Pilih divisi...</option>
                                                    <option value="HRD">HRD</option>
                                                    <option value="ORG">ORG</option>
                                                    <option value="UMUM">UMUM</option>
                                                    <option value="MEDFO">MEDFO</option>
                                                    <option value="HUBLU">HUBLU</option>
                                                    <option value="KWU">KWU</option>
                                                </select>
                                                @error('pilihan_dua')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Alasan pilihan
                                                    pertama</label>
                                                <textarea type="text" name="alasan_satu" id="form3Example1q" class="form-control"></textarea>
                                                @error('alasan_satu')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Alasan pilihan kedua</label>
                                                <textarea type="text" name="alasan_dua" id="form3Example1q" class="form-control"></textarea>
                                                @error('alasan_dua')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Apakah bersedia dipindahkan
                                                    ke divisi lain ?</label>
                                                <select name="pindah_divisi" class="form-control" id="">
                                                    <option value="">Ya / Tidak</option>
                                                    <option value="ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                                @error('pindah_divisi')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Motivasi</label>
                                                <textarea type="text" name="motivasi" id="form3Example1q" class="form-control"></textarea>
                                                @error('motivasi')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1q">Komitmen</label>
                                                <textarea type="text" name="komitmen" id="form3Example1q" class="form-control"></textarea>
                                                @error('komitmen')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="name">CV</div>
                                            <div class="value">
                                                <input type="file" name="cv" @error('cv') is-invalid @enderror"
                                                    value="#">
                                                <div class="label--desc">Upload file pdf</div>
                                                @error('cv')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="name">Portofolio</div>
                                            <div class="value">
                                                <input type="file" name="porto" @error('porto') is-invalid @enderror"
                                                    value="#">
                                                <div class="label--desc">Upload file pdf (Wajib divisi medfo)</div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($kepengurusan as $i)
                                        <input type="hidden" name="kepengurusan_id" value="{{ $i->id }}">
                                    @endforeach
                                    <div class="row">
                                        <div class="col-2 mt-5 ml-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content">
                                            <button type="submit" class="btn btn-success btn-lg mb-1">Daftar</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

</html>
