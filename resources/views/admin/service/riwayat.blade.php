@extends('admin.app')
@section('content')
    <div class="container">
        <h3 class="row mb-5 ml-2">Riwayat servis</h3>
        <div class="card-body px-0 pb-0 ">
            <div class="table-responsive ">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Hari</th>
                            <th>Sesi</th>
                            <th>No_hp</th>
                            <th>Teknisi</th>
                            <th>user</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->user()->role == 'teknisi')
                            @foreach ($service->where('status', 'selesai')->where('teknisi_id', $teknisis->id) as $item)
                                <tr>
                                    <td class="text-sm">{{ $loop->iteration }}</td>
                                    <td class="text-sm">{{ $item->nama }}</td>
                                    <td class="text-sm">{{ $item->hari }}</td>
                                    <td class="text-sm">{{ $item->sesi }}</td>
                                    <td class="text-sm">{{ $item->no_hp }}</td>
                                    <td class="test-sm">{{ $item->teknisi->user->name ?? '-' }}</td>
                                    <td class="test-sm">{{ $item->user->name ?? '-' }}</td>
                                    <td class="text-sm">{{ $item->pesan }}</td>
                                    <td><button type="button" class="btn btn-sm btn-primary" disabled>Selesai</button></td>
                                    <td class="text-sm">
                                        <form action="{{ route('service.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"><i class="fas fa-trash text-secondary"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
                            @foreach ($service->where('status', 'selesai')->where('teknisi_id', $teknisis->id) as $item)
                                <tr>
                                    <td class="text-sm">{{ $loop->iteration }}</td>
                                    <td class="text-sm">{{ $item->nama }}</td>
                                    <td class="text-sm">{{ $item->hari }}</td>
                                    <td class="text-sm">{{ $item->sesi }}</td>
                                    <td class="text-sm">{{ $item->no_hp }}</td>
                                    <td class="test-sm">{{ $item->teknisi->user->name ?? '-' }}</td>
                                    <td class="test-sm">{{ $item->user->name ?? '-' }}</td>
                                    <td class="text-sm">{{ $item->pesan }}</td>
                                    <td><button type="button" class="btn btn-sm btn-primary" disabled>Selesai</button></td>
                                    <td class="text-sm">
                                        <form action="{{ route('service.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"><i class="fas fa-trash text-secondary"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
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
