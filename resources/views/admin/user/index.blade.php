@extends('admin.app')
@section('content')
    <div class="container-fluid">
        <table class="table caption-top">
            <caption>Berikut adalah Proposal Ormawa yang harus dilengkapi
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </caption>
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Transkrip</th>
                    <th scope="col">Surat Rekomendasi</th>
                    <th scope="col">Sertifikat</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.container-fluid -->
@endsection
