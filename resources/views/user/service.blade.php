@extends('user.app')
@section('content')
    {{-- <style>
    border {
        border: 1px;
    }
</style> --}}
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bolder">Silahkan isi form dibawah ini untuk melakukan booking jadwal servis
                        </h5>
                        <br>
                        <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                    <br>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <select name="hari" class="form-control" id="hari">
                                            <option value="" selected disabled>Pilih Hari</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>sesi</label>
                                        <select name="sesi" class="form-control" id="sesi">
                                            <option value="" selected disabled>Pilih sesi</option>
                                            <option value="sesi 1">Sesi 1</option>
                                            <option value="sesi 2">Sesi 2</option>
                                            <option value="sesi 3">Sesi 3</option>
                                            <option value="sesi 4">Sesi 4</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-6">
                                    <label>hp</label>
                                    <input class="form-control" type="text" name="no_hp">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>pesan</label>
                                    <input class="form-control" type="text" name="pesan">
                                    <br>
                                </div>
                                <div class="col-sm-6">
                                    <div class="name">Pilih Teknisi</div>
                                    <div class="value">
                                        <select class="form-select" name="teknisi_id" aria-label="Default select example">
                                            @foreach ($teknisi as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <div class="name">KTM / KTP</div>
                                        <div class="value">
                                            <input type="file" name="foto">
                                            <div class="label--desc">Upload file gambar</div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type="submit">Booking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function createOption(value, text) {
            var option = document.createElement('option');
            option.text = text;
            option.value = value;
            return option;
        }

        var hourSelect = document.getElementById('hours');
        for (var i = 8; i <= 16; i++) {
            hourSelect.add(createOption(i, i));
        }

        var minutesSelect = document.getElementById('minutes');
        for (var i = 0; i < 60; i += 15) {
            minutesSelect.add(createOption(i, i));
        }
    </script>

<div class="modal fade" id="antrian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="antrianLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered"  role="document">
    <div id="kartuantrian">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <img src="{{ asset('img/cutlogo.jpg') }}" style=”float:left; width="55";height="55"” />Klinik {{ env("APP_NAME") }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="h3">Nomor Antrian : <span
                        class="text-primary">{{ Session::has('nama') ? Session::get('nama') : '' }}</span>
                </p>
                <p class="h3">Atas Nama : <span
                        class="text-primary">{{ Session::has('hari') ? Session::get('hari') : '' }}</span></p>
                <p>Daftar pada jam : <span
                        class="text-primary">{{ Session::has('sesi') ? Session::get('sesi') : '' }}</span>
                </p>
            </div>
            <div class="modal-footer">
                <p>Tanggal : <span
                        class="text-primary">{{ Session::has('tanggaldaftar') ? Session::get('tanggaldaftar') : '' }}</span>
                </p>
                
                <a type="button" class="btn btn-secondary" href="/profil">
                    <i class="fas fa-users me-2"></i>
                    Cek Antrian
                </a>
                <button type="button" class="btn btn-primary" id="download">Simpan</button>
            </div>
        </div>
    </div>
</div>
</div>
 <!--------------------------------------------------------modal antrian----------------------------------------------------------------------------------->    
 <script>
    @if (Session::has('nomorAntrian'))
        $(document).ready(function() {
            $('#antrian').modal('show')
        });
    @endif
</script>
<!--------------------------------------------------------fungsi download kartu antrian----------------------------------------------------------------------------------->
<script>
    document.getElementById("download").addEventListener("click", function() {
        const imgName = prompt("Input nama gambar yang akan diunduh: ")
        html2canvas(document.querySelector('#kartuantrian')).then(function(canvas) {

            console.log(canvas);
            saveAs(canvas.toDataURL(),imgName + '.jpg');
        });
    });

    function saveAs(uri, filename) {
        var link = document.createElement('a');
        if (typeof link.download === 'string') {
            link.href = uri;
            link.download = filename;
            //Firefox requires the link to be in the body
            document.body.appendChild(link);
            //simulate click
            link.click();
            //remove the link when done
            document.body.removeChild(link);
        } else {
            window.open(uri);
        }
    }
</script>
@endsection
