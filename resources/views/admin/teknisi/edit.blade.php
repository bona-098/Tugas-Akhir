@extends('admin.app')
@section('content')
    <style>
        .border {
            border: 2px;
        }
    </style>
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
        <div class="row">
            <div class="col-lg-10">
                <h4 class="text-danger">Edit Teknisi</h4>
            </div>            
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('teknisi-index.update', $teknisi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama" 
                                    value="{{ $teknisi->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Nim</label>
                                    <input class="form-control" type="text" name="nim" 
                                    value="{{ $teknisi->nim }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Hari</label>
                                    <input class="form-control" type="date" name="hari"
                                        value="{{ $teknisi->hari }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>sesi</label>
                                    <input class="form-control" type="text" name="sesi"
                                        value="{{ $teknisi->sesi }}">
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
                                            href="{{ asset('teknisi/foto/' . $teknisi->foto) }}" target="_blank">
                                            <img id="preview-image" src="{{ asset('teknisi/foto/' . $teknisi->foto) }}"
                                                height="120px" width="120px">
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
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type="submit">Edit</button>
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
