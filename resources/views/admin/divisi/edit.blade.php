<title>Edit Divisi : {{ $divisi->nama }}</title>
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
    <div class="container mb-5">
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="row mb-3 ml-2">Edit Divisi</h4>
                        <form action="{{ route('divisi.update', $divisi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $divisi->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>waktu</label>
                                    <input class="form-control" type="text" name="kadiv"
                                        value="{{ $divisi->kadiv }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>deskripsi</label>
                                    <input class="form-control" type="text" name="visi"
                                        value="{{ $divisi->visi }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>deskripsi</label>
                                    <input class="form-control" type="text" name="misi"
                                        value="{{ $divisi->misi }}">
                                    <br>
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
