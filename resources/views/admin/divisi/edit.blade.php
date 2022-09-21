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
                <h4 class="text-danger">Edit Divisi</h4>
            </div>            
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
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
                                    <input class="form-control" type="text" name="staffahli"
                                        value="{{ $divisi->staffahli }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>deskripsi</label>
                                    <input class="form-control" type="text" name="staff"
                                        value="{{ $divisi->staff }}">
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
