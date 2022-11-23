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
                        <h4 class="row mb-3 ml-2">Edit program kerja : {{$proker->nama}}</h4>
                        <form action="{{ route('proker.update', $proker->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama"
                                        value="{{ $proker->nama }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Penanggung Jawab</label>
                                    <input class="form-control" type="text" name="penanggung_jawab"
                                        value="{{ $proker->penanggung_jawab }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Pengurus</label>
                                    <input class="form-control" type="text" name="pengurus"
                                        value="{{ $proker->pengurus }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Landasan Kegiatan</label>
                                    <input class="form-control" type="text" name="landasan_kegiatan"
                                        value="{{ $proker->landasan_kegiatan }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Tujuan Kegiatan</label>
                                    <input class="form-control" type="text" name="tujuan_kegiatan"
                                        value="{{ $proker->tujuan_kegiatan }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Objek Segmentasi</label>
                                    <input class="form-control" type="text" name="objek_segmentasi"
                                        value="{{ $proker->objek_segmentasi }}">
                                    <br>
                                </div>                                
                                <div class="col-12 col-sm-6">
                                    <label>Deskripsi</label>
                                    <input class="form-control" type="text" name="deskripsi"
                                        value="{{ $proker->deskripsi }}">
                                    <br>
                                </div>                                
                                <div class="col-12 col-sm-6">
                                    <label>Parameter Keberhasilan</label>
                                    <input class="form-control" type="text" name="parameter_keberhasilan"
                                        value="{{ $proker->parameter_keberhasilan }}">
                                    <br>
                                </div>                                
                                <div class="col-12 col-sm-6">
                                    <label>Kebutuhan Dana</label>
                                    <input class="form-control" type="text" name="kebutuhan_dana"
                                        value="{{ $proker->kebutuhan_dana }}">
                                    <br>
                                </div>                                
                                <div class="col-12 col-sm-6">
                                    <label>Sumber Dana</label>
                                    <input class="form-control" type="text" name="sumber_dana"
                                        value="{{ $proker->sumber_dana }}">
                                    <br>
                                </div>                                
                                <div class="col-12 col-sm-6">
                                    <label>Jumlah SDM</label>
                                    <input class="form-control" type="text" name="jumlah_sdm"
                                        value="{{ $proker->jumlah_sdm }}">
                                    <br>
                                </div>                                
                                <div class="col-12 col-sm-6">
                                    <label>Kebutuhan Lain</label>
                                    <input class="form-control" type="text" name="kebutuhan_lain"
                                        value="{{ $proker->kebutuhan_lain }}">
                                    <br>
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