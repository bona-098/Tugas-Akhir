@extends('admin.app')
@section('content')
    <div class="container-fluid">
        <div class="button">
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('kepengurusan.create') }}">Tambah Kepengurusan</a>
        </div>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Pembina</th>
                    <th scope="col">BPH</th>
                    <th scope="col">Pengurus_lain</th>
                    <th scope="col">Anggota</th>
                    <th scope="col">Program Kerja</th>                    
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kepengurusan as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->pembina }}</td>
                        <td>{{ $item->bph }}</td>
                        <td>{{ $item->pengurus_lain }}</td>
                        <td>{{ $item->angggota }}</td>
                        <td>{{ $item->program_kerja }}</td>                        
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('kepengurusan.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{route('kepengurusan.destroy', $item->id)}}" method="POST">
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
    <!-- /.container-fluid -->
@endsection
