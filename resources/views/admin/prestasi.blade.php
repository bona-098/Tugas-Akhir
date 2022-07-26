@extends('admin.app')
@section('content')
    <div class="container border">
        <div class="d-grid gap-1">
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('admin-prestasi.create') }}">Tambah prestasi</a>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive border">
                <table id="example" class="table table-flush" id="products-list">

                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Pencapaian</th>
                            <th>Dospem</th>
                            <th>Kategori</th>
                            <th>Nama Kegiatan</th>
                            <th>Penyelenggara</th>
                            <th>Waktu</th>
                            <th>Media</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($prestasi as $item)
                        <tbody>
                            <tr>
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->nim }}</td>
                                <td class="text-sm">{{ $item->pencapaian }}</td>
                                <td class="text-sm">{{ $item->dospem }}</td>
                                <td class="text-sm">{{ $item->kategori }}</td>
                                <td class="text-sm">{{ $item->nama_kegiatan }}</td>
                                <td class="text-sm">{{ $item->penyelenggara }}</td>
                                <td class="text-sm">{{ $item->waktu }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="pic"><img src="{{ asset('prestasi/foto/' . $item->foto) }}"
                                                class="img-fluid" width="80" height="80" alt="pp"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('admin-prestasi.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="{{route('admin-prestasi.destroy', $item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
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
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
