@extends('admin.app')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{ $item }}
            </div>
        @endforeach
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="button mb-3">
            <a button type="button" class="btn btn-primary" id="liveToastBtn" href="{{ route('anggota.create') }}">Tambah
                Anggota</a>
        </div>

        <div class="table-responsive border">
            <table class="table table-flush" id="products-list">

                <thead class="thead-dark">
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
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('anggota.edit', $item->id) }}"><i
                                                class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('anggota.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                    class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @push('scripts') --}}

    <script>
        $(document).ready(function() {
            $('#products-list').DataTable({
                dom: 'lBfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, 100, 1000, -1],
                    ['5', '10', '25', '50', '100', '1000', 'All']
                ],

                language: {
                    "searchPlaceholder": "Cari nama kepengurusan",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        });
    </script>
    {{-- @endpush --}}
@endsection
