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
            <a button type="button" class="btn btn-primary" id="liveToastBtn" href="{{ route('kepengurusan.create') }}">Tambah
                Kepengurusan</a>
        </div>

        <div class="table-responsive">
            <table class="table table-flush" id="products-list">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tahun</th>
                        <th>Pembina</th>
                        <th>Ketua</th>
                        <th>Wakil ketua internal</th>
                        <th>Wakil ketua eksternal</th>
                        <th>Sekretaris</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kepengurusan as $item)
                        <tr>
                            <div>                                
                                <td class="text-sm">{{ $loop->iteration }}</td>
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->tahun }}</td>
                                <td class="text-sm">{{ $item->pembina }}</td>
                                <td class="text-sm">{{ $item->ketua }}</td>
                                <td class="text-sm">{{ $item->internal }}</td>
                                <td class="text-sm">{{ $item->external }}</td>
                                <td class="text-sm">{{ $item->sekretaris }}</td>
                                </a>
                            </div>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('kepengurusan.edit', $item->id) }}"><i
                                                class="fa fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="{{ route('kepengurusan.show', $item->id) }}"><i
                                                class="fa fa-edit"></i> show</a>
                                        <form action="{{ route('kepengurusan.destroy', $item->id) }}" method="POST">
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
