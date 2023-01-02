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
    <div class="mb-3">
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Hari</th>
                            <th>Sesi</th>
                            <th>No.hp</th>
                            <th>Teknisi</th>
                            <th>User</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>
                                <div class="text-center">
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->user()->role == 'teknisi')
                            @foreach ($service->where('status', 'proses')->where('teknisi_id', $teknisis->id) as $item)
                                <tr>
                                    <td class="text-sm">{{ $loop->iteration }}</td>
                                    <td class="text-sm">{{ $item->nama }}</td>
                                    <td class="text-sm">{{ $item->hari }}</td>
                                    <td class="text-sm">{{ $item->sesi }}</td>
                                    <td class="text-sm">{{ $item->no_hp }}</td>
                                    <td class="test-sm">{{ $item->teknisi->user->name ?? '-' }}</td>
                                    <td class="test-sm">{{ $item->user->name ?? '-' }}</td>
                                    <td class="text-sm">{{ $item->pesan }}</td>
                                    <td>
                                        @if ($item->status == 'proses')
                                            <a href="{{ url('change-status/' . $item->id . 'status?terima') }}"
                                                onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success"
                                                type="hidden">Proses</a>
                                        @elseif ($item->status == 'selesai')
                                            <a href="{{ url('change-status/' . $item->id . 'status?selesai') }}"
                                                onclick="return confirm('Are you Sure?')"
                                                class="btn btn-sm btn-primary">selesai</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-sm">
                                            <a href="{{ url('change-status/' . $item->id . '?status=selesai') }}"
                                                onclick="return confirm('Are you Sure?')"
                                                class="btn btn-sm btn-primary">Selesai</a>
                                        </div>
                                        <form action="{{ route('service.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"><i class="fas fa-trash text-secondary"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
                            @foreach ($service->where('status', 'proses') as $item)
                                <tr>
                                    <td class="text-sm">{{ $loop->iteration }}</td>
                                    <td class="text-sm">{{ $item->nama }}</td>
                                    <td class="text-sm">{{ $item->hari }}</td>
                                    <td class="text-sm">{{ $item->sesi }}</td>
                                    <td class="text-sm">{{ $item->no_hp }}</td>
                                    <td class="test-sm">{{ $item->teknisi->user->name ?? '-' }}</td>
                                    <td class="test-sm">{{ $item->user->name ?? '-' }}</td>
                                    <td class="text-sm">{{ $item->pesan }}</td>
                                    <td>
                                        @if ($item->status == 'proses')
                                            <a href="{{ url('change-status/' . $item->id . 'status?terima') }}"
                                                onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success"
                                                type="hidden">Proses</a>
                                        @elseif ($item->status == 'selesai')
                                            <a href="{{ url('change-status/' . $item->id . 'status?selesai') }}"
                                                onclick="return confirm('Are you Sure?')"
                                                class="btn btn-sm btn-primary">selesai</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-sm">
                                            <a href="{{ url('change-status/' . $item->id . '?status=selesai') }}"
                                                onclick="return confirm('Are you Sure?')"
                                                class="btn btn-sm btn-primary">Selesai</a>
                                        </div>

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
                    "searchPlaceholder": "Cari",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        });
    </script>
@endsection
