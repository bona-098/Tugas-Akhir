@extends('admin.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">dokumentasi</h1>
    <div align="right" class="pt-1">
        <a href="" class="btn btn-success btn-xs"><i class="fa fa-sync"></i></a>
        <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus"> Tambah dokumentasi</i></button>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table" id="myTable">
            <thead>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>media</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($dokumentasi as $id)
                    <tr>
                        {{-- <td>{{$loop->iteration}}</td> --}}
                        <td>{{ $id->nama }}</td>
                        <td>{{ $id->deskripsi }}</td>
                        <td>{{ $id->waktu }}</td>
                        {{-- <td><a href="{{ asset('dokumentasi/media/' . $id->media) }}" target="_blank"><img src="{{asset('images/dokumentasi/'.$dokumentasi->media)}}" width="50px" height="50px" alt=""></td> --}}
                        {{-- <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('admin-dokumentasi.edit',$dokumentasi->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{route('admin-dokumentasi.destroy', $dokumentasi->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
