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
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Hari</label>
                                    <input class="form-control" type="date" name="hari">
                                </div>
                                <label name="jam">Jam</label>
                                <div class="col-6 col-sm-3 mt-4">
                                    <select class="form-select" id="hours" >ac</select>
                                </div>
                                <div class="col-6 col-sm-3 mt-4">
                                    <select class="form-select" id="minutes"  >ac</select>
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
                                <div class="row">
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-3">
                                        <div class="name">KTM / KTP</div>
                                        <div class="value">
                                            <input type="file" name="foto">
                                            <div class="label--desc">Upload file gambar</div>
                                        </div>
                                    </div>
                                </div>
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
@endsection
