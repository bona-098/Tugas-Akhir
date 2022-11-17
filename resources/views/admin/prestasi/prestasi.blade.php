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
    <div class="container">
        <div class="mb-3">
            <a button type="button" class="btn btn-primary" id="liveToastBtn" href="{{ route('prestasi.create') }}">Tambah
                prestasi</a>
        </div>

        <div class="table-responsive border">
            <table class="table table-flush" id="products-list">

                <thead class="thead-dark">
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Jenis Kegiatan</th>
                        <th>Partisipasi</th>
                        <th>Deskripsi</th>
                        <th>Penyelenggara</th>
                        <th>Waktu</th>
                        <th>tempat</th>
                        <th>Sertifikat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestasi as $item)
                    {{-- @dd($item); --}}
                        <tr>
                            <td class="text-sm">{{ $item->nama_kegiatan }}</td>
                            <td class="text-sm">{{ $item->jenis_kegiatan }}</td>
                            <td class="text-sm">{{ $item->partisipasi }}</td>
                            <td class="text-sm">{{ $item->deskripsi }}</td>
                            <td class="text-sm">{{ $item->penyelenggara }}</td>
                            <td class="text-sm">{{ $item->waktu }}</td>
                            <td class="text-sm">{{ $item->tempat }}</td>
                            <td>
                                <a href="{{asset('images/prestasi/')}}/{{ $item->sertifikat }}" target ="_blank">{{ $item->sertifikat }}</a>
                                {{-- <a href="{{ route('dokumen.edit',$data->id) }}"class="btn btn-sm btn-warning">Edit</a> --}}
                                {{-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdropdelete{{$data->id}}">
                                  Delete
                                </button> --}}
                            </td>
                            {{-- <td>
                                <div>
                                    <a href="{{ asset('images/prestasi/' . $item->sertifikat) }}">
                                    {{ $item->sertifikat }}
                                    </a>
                                </div>
                            </td> --}}
                            {{-- <td>
                                <div class="d-flex">
                                    <div class="pic"><img src="{{ asset('images/prestasi/' . $item->sertifikat) }}"
                                            class="img-fluid" width="80" height="80" alt="pp"></div>
                                </div>
                            </td> --}}
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('prestasi.edit', $item->id) }}"><i
                                                class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('prestasi.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                    class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            {{-- <td class="text-sm">
                                    <a href="{{ route('admin-prestasi.edit', $item->id) }}" class="mx-3"
                                        data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <form action="{{ route('admin-prestasi.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <i class="fas fa-trash text-secondary"></i>
                                    </form>
                                </td> --}}
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
