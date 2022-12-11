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
    <div class="container border">
        <div>
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('dokumentasi.create') }}">Tambah Dokumentasi</a>
            </div>
            <br>
        <div class="card-body px-0 pb-0 border">
            <div class="table-responsive border">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-dark">
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
                                <td><a href="{{asset('images/dokumentasi/'. $item->media)}}" target="_blank">
                                    <img src="{{asset('images/dokumentasi/'.$item->media)}}" width="50px" height="50px" alt="">
                                </td>
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
