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
                        <h4 class="row mb-5 ml-2">Edit : {{ $anggota->nama }}</h4>
                        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama" 
                                    value="{{ $anggota->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Nim</label>
                                    <input class="form-control" type="text" name="nim" value="{{ $anggota->nim }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Divisi</label>
                                    <select name="divisi_id" class="form-control">
                                        @foreach ($divisi as $div)
                                            <option value="{{ $div->id }}">{{ $div->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 mb-5 mt-5 ml-2">
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a button class="btn btn-dark" href="{{ URL::previous() }}">Batal</button></a>
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
