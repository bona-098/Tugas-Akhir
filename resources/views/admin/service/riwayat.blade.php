@extends('admin.app')
@section('content')
    
    <div class="container">
        <div class="mb-3">
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('service.create') }}">Tambah Jadwal</a>
        </div>
        <div class="card-body px-0 pb-0 ">
            <div class="table-responsive ">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Hari</th>
                            <th>Sesi</th>
                            <th>No_hp</th>
                            <th>Teknisi</th>
                            <th>user</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            {{-- <th>
                                <div class="text-center">
                                    Aksi
                                </div>
                            </th>                             --}}
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service->where('status', 'selesai') as $item)
                            <tr>
                                {{-- <td class="text-sm">{{ $loop->iteration }}</td> --}}
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->hari }}</td>
                                <td class="text-sm">{{ $item->sesi }}</td>
                                <td class="text-sm">{{ $item->no_hp }}</td>
                                <td class="test-sm">{{ $item->teknisi->nama ?? "-" }}</td>
                                <td class="test-sm">{{ $item->user->name ?? "-" }}</td>
                                <td class="text-sm">{{ $item->pesan }}</td>
                                <td>
                                    @if($item->status=='terima')
                                    <a href="{{ url('change-status/'.$item->id.'status?terima') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Terima</a>
                                    @elseif ($item->status=='selesai')
                                    <a href="{{ url('change-status/'.$item->id.'status?selesai') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-primary">selesai</a>
                                    @endif
                                </td>
                                {{-- <td>
                                    <div class="text-center">
                                    
                                        <a href="{{ url('change-status/'.$item->id.'?status=terima') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Terima</a>
                                        <a href="{{ url('change-status/'.$item->id.'?status=selesai') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-primary">Selesai</a>
                                    </div>
                                </td> --}}
                                <td class="text-sm">
                                    <form action="{{ route('service.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"><i class="fas fa-trash text-secondary"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#products-list').DataTable({
                dom: 'lBfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, 100, 1000, -1],
                    ['5', '10', '25', '50', '100', '1000', 'All']
                ],
                
                language: {
                    "searchPlaceholder": "Cari nama pemesan",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        });
    </script>
@endsection
