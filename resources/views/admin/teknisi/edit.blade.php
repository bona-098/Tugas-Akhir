<title>Edit Teknisi : {{ $teknisi->user->name }}</title>
@extends('admin.app')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>sorry?</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid py-4">
    
    <div class="row mt-4">
        <div class="col-lg-12 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                        <h4 class="row mb-5">Edit Teknisi</h4>
                        <form action="{{ route('teknisi.update', $teknisi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama"
                                    value="{{ $teknisi->user->name }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Nim</label>
                                    <input class="form-control" type="text" name="nim"
                                    value="{{ $teknisi->nim }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <div class="form-group">
                                        <label>Pilih Hari</label>
                                        <select name="hari" class="form-control" id="hari">
                                            <option value="{{ $teknisi->hari }}" selected>{{ $teknisi->hari }}</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>No.Hp</label>
                                    <input class="form-control" type="number" name="no_hp"
                                        value="{{ $teknisi->no_hp }}">
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <a class="card-profile-image mt-4"
                                            href="{{ asset('images/teknisi/' . $teknisi->foto) }}" target="_blank">
                                            <img id="preview-image" src="{{ asset('images/teknisi/' . $teknisi->foto) }}"
                                                height="100px" width="100px">
                                        </a>
                                        <div class="value">
                                            <input type="file" name="foto" id="foto">
                                            <div class="label--desc">Upload your foto with pdf format. Max file size 50 MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 mb-5 mt-5 ml-2">
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a button class="btn btn-dark" href="/prestasi">Batal</button></a>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#foto').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        </script>
@endsection
