@extends('user.app')
@section('content')
    <link href="colorlib-regform-6/css/main.css" rel="stylesheet" media="all">

    <body>
        <div class="page-wrapper bg-transparent p-t-130 p-b-50">
            <div class="wrapper wrapper--w900">
                <div class="card card-6">
                    <div class="card-heading">
                        <h2 class="title text-center">Pendaftaran Pengurus SAA</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-row">
                                <div class="name">Bidang Minat</div>
                                <div class="value">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">HRD</option>
                                        <option value="2">ORG</option>
                                        <option value="3">Umum</option>
                                        <option value="4">KWU</option>
                                        <option value="5">Karsa Cipta (PKM-KC)</option>
                                        <option value="6">Futuristik Konstruktif</option>
                                        <option value="7">Gagasan Tertulis</option>
                                        <option value="8">Artikel Ilmiah (PKM-AI)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Nama</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="full_name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Nim</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="full_name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Prodi</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="full_name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">No.Hp</div>
                                <div class="value">
                                    <input class="input--style-6" type="text" name="full_name" placeholder="08xxxxxxx">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Resume</div>
                                <div class="value">
                                    <div class="input-group js-input-file">
                                        <input class="input-file" type="file" name="file_cv" id="file">
                                        <label class="label--file" for="file">Choose file</label>
                                        <span class="input-file__info">No file chosen</span>
                                    </div>
                                    <div class="label--desc">Upload your Resume with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Transkip</div>
                                <div class="value">
                                    <div class="input-group js-input-file">
                                        <input class="input-file" type="file" name="file_cv" id="file">
                                        <label class="label--file" for="file">Choose file</label>
                                        <span class="input-file__info">No file chosen</span>
                                    </div>
                                    <div class="label--desc">Upload your transkip with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Surat Rekomendasi</div>
                                <div class="value">
                                    <div class="input-group js-input-file">
                                        <input class="input-file" type="file" name="file_cv" id="file">
                                        <label class="label--file" for="file">Choose file</label>
                                        <span class="input-file__info">No file chosen</span>
                                    </div>
                                    <div class="label--desc">Upload your SK with pdf format. Max file size 50 MB</div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">Kirim</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="colorlib-regform-6/vendor/jquery/jquery.min.js"></script>
        <script src="colorlib-regform-6/vendor/jquery/jquery.js"></script>

        <!-- Main JS-->
        <script src="colorlib-regform6/js/global.js"></script>

    </body>
@endsection
