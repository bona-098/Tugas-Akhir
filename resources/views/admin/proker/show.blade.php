@extends('admin.app')
@section('content')
    <div class="container mb-5">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Program kerja : {{ $proker->nama }}</h3>
                <form action="{{ route('proker.show', $proker->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('patch')
                    <br>
                    <fieldset disabled="disabled">
                        <div class="row justify-content-evenly">
                            <div class="col-5">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Nama Kepengurusan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Penanggung jawab</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->penanggung_jawab }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Pengurus</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->pengurus }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Landasan kegiatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->landasan_kegiatan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Landasan kegiatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->landasan_kegiatan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Objek segmentasi</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->objek_segmentasi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Deskripsi</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->deskripsi }}">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Parameter keberhasilan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->parameter_keberhasilan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Tujuan kegiatan</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->tujuan__kegiatan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Kebutuhan dana</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->kebutuhan_dana }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Sumber dana</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->sumber_dana }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Jumlah dana</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->jumlah_dana }}">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Kebutuhan lain</label>
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="{{ $proker->kebutuhan_lain }}">
                                </div>
                            </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-2 mb-5 mt-5 ml-5">
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a button class="btn btn-dark" href="{{ URL::previous() }}">Kembali</button></a>
                                </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
@endsection
