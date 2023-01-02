@extends('user.app')
@section('content')
    <section>
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-lg-12 mt-lg-0 mt-4">
                    <div class="card">
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
                        <div class="card-body">
                            <h5 class="font-weight-bolder">Silahkan isi form dibawah ini untuk melakukan booking jadwal
                                servis
                            </h5>
                            <br>
                            <form action="" method="GET" id="form_1">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label>Hari</label>
                                        <input type="date" class="form-control" name="hari" id="hari"
                                            onchange="this.form.submit()">
                                        <script>
                                            document.getElementById('hari').value = "<?php if (isset($_GET['hari']) && $_GET['hari']) {
                                                echo $_GET['hari'];
                                            } ?>";
                                        </script>
                                        <br>
                                    </div>
                                    <br>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="name">Pilih Teknisi</div>
                                        <div class="value">
                                            <select name="teknisi_id" class="form-select" id="teknisi_id"
                                                onchange="this.form.submit()">
                                                <option value="">Pilih Teknisi....</option>
                                                @foreach ($filter as $item)
                                                    <option @if (request()->teknisi_id == $item->id) selected @endif
                                                        value="{{ $item->id }}">{{ $item->user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('teknisi_id')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <script>
                                            document.getElementById('teknisi_id').value = "<?php if (isset($_GET['teknisi_id']) && $_GET['teknisi_id']) {
                                                echo $_GET['teknisi_id'];
                                            } ?>";
                                        </script>
                                    </div>
                                    <br>
                                
                                    <div class="col-md-6 col-sm-12">
                                    <label>Pilih Sesi</label>
                                    <div class="value">
                                        <select name="sesi" class="form-select" id="sesi"
                                            onchange="this.form.submit()">
                                            <option value="">pilih sesi....</option>
                                            @foreach ($dataSesi as $item)
                                                <option @if (request()->sesi == $item) selected @endif
                                                    value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('sesi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <script>
                                            document.getElementById('sesi').value = "<?php if (isset($_GET['sesi']) && $_GET['sesi']) {
                                                echo $_GET['sesi'];
                                            } ?>";
                                        </script>
                                    </div>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('service') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="hari" value="<?php if (isset($_GET['hari']) && $_GET['hari']) {
                                    echo $_GET['hari'];
                                } ?>"><br>
                                <input type="hidden" name="sesi" value="<?php if (isset($_GET['sesi']) && $_GET['sesi']) {
                                    echo $_GET['sesi'];
                                } ?>"><br>
                                <input type="hidden" name="teknisi_id" value="<?php if (isset($_GET['teknisi_id']) && $_GET['teknisi_id']) {
                                    echo $_GET['teknisi_id'];
                                } ?>"><br>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label>Nama</label>
                                        <input class="form-control" type="text" name="nama"
                                            @error('nama') is-invalid @enderror"value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-12 col-sm-6 ">
                                        <label>No.hp</label>
                                        <input class="form-control" type="number" name="no_hp"
                                            @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Keluhan</label>
                                        <input class="form-control" type="text" name="pesan"
                                            @error('pesan') is-invalid @enderror" value="{{ old('pesan') }}">
                                        @error('pesan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <br>
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
    </section>
    <script>
        $('#form_1').submit(function() {
            return false;
        });
    </script>
    <script>
        $("#date1").flatpickr({
            enableTime: true,
            dateFormat: "m-d-Y",
            "disable": [
                function(date) {
                    return (date.getDay() === 0 || date.getDay() === 6); // disable weekends
                }
            ],
            "locale": {
                "firstDayOfWeek": 1 // set start day of week to Monday
            }
        });
    </script>

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
