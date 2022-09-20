@extends('admin.app')
@section('content')
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />
    <style>
        .border {
            border: 2px;
        }
    </style>
    <div class="container border">
        <div>
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('dokumentasi.create') }}">Tambah Dokumentasi</a>
            </div>
            <br>
        <div class="card-body px-0 pb-0 border">
            <div class="table-responsive border">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Waktu</th>
                            <th>Deskripsi</th>
                            <th>Media</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokumentasi as $item)
                            <tr>
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->waktu }}</td>
                                <td class="text-sm">{{ $item->deskripsi }}</td>                                
                                <td>
                                    <div class="d-flex">
                                        <div class="pic"><img src="{{ asset('images/dokumentasi/' . $item->media) }}"
                                                class="img-fluid" width="80" height="80" alt="pp"></div>
                                    </div>
                                </td>
                                {{-- <td><span class="badge badge-danger badge-sm">pending</span></td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('dokumentasi.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="{{route('dokumentasi.destroy', $item->id)}}" method="POST">
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
                </table>
            </div>
        </div>
    </div>
@endsection
