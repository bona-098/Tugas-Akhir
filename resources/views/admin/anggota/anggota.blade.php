@extends('admin.app')
@section('content')
    <div class="container-fluid">
        <table id="example" class="table table-striped">
            {{-- <caption>Berikut adalah Proposal Ormawa yang harus dilengkapi
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
            </caption> --}}
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
                @foreach ($daftar as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->resume }}</td>
                        <td>{{ $item->transkip }}</td>
                        <td>{{ $item->surat_rekomendasi }}</td>
                        <td>{{ $item->sertifikat }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('anggota.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{route('anggota.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
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
            </tfoot>
        </table>
    </div>
    <!-- /.container-fluid -->
@endsection
