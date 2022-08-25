@extends('admin.app')
@section('content')
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />
    <style>
        .border {
            border: 2px;
        }
    </style>
    <div class="container border">
        <div class="d-grid gap-1">
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('kepengurusan.create') }}">SPJ-LPJ</a>
        </div>
        <div class="card-body px-0 pb-0 border">
            <div class="table-responsive border">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama Kepengurusan</th>
                            <th>Tahun</th>
                            <th>Pembina</th>
                            <th>BPH</th>
                            <th>Pengurus lain</th>
                            <th>anggota</th>
                            <th>program_kerja</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kepengurusan as $item)
                            <tr>
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->tahun }}</td>
                                <td class="text-sm">{{ $item->pembina }}</td>
                                <td class="text-sm">{{ $item->bph }}</td>
                                <td class="text-sm">{{ $item->pengurus_lain }}</td>
                                <td class="text-sm">{{ $item->anggota }}</td>
                                <td class="text-sm">{{ $item->program_kerja }}</td>
                            
                                {{-- <td><span class="badge badge-danger badge-sm">pending</span></td> --}}
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
        </div>
    </div>
@endsection
