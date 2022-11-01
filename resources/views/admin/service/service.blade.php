@extends('admin.app')
@section('content')
    <style>
        .border {
            border: 2px;
        }
    </style>
    <div class="container border">
        <div class="d-grid gap-1">
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('service.create') }}">Tambah Jadwal</a>
        </div>
        <div class="card-body px-0 pb-0 border">
            <div class="table-responsive border">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Hari</th>
                            <th>Sesi</th>
                            <th>No_hp</th>
                            <th>Teknisi</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>
                                <div class="text-center">
                                    Aksi
                                </div>
                            </th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $item)
                            <tr>
                                {{-- <td class="text-sm">{{ $loop->iteration }}</td> --}}
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->hari }}</td>
                                <td class="text-sm">{{ $item->sesi }}</td>
                                <td class="text-sm">{{ $item->no_hp }}</td>
                                <td class="test-sm">{{ $item->teknisi->nama ?? "-" }}</td>
                                <td class="text-sm">{{ $item->pesan }}</td>
                                <td>
                                    @if($item->status==1)
                                    <a href="{{ url('change-status/'.$item->id.'status?Terima') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Menunggu</a>
                                    @elseif ($item->status==2)
                                    <a href="{{ url('change-status/'.$item->id.'status?Proses') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-danger">Proses</a>
                                    @else
                                    <a href="{{ url('change-status/'.$item->id.'status?Tolak') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-primary">Selesai</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="text-center">
                                    
                                        <a href="{{ url('change-status/'.$item->id.'?status=Terima') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Menunggu</a>
                                        
                                        <a href="{{ url('change-status/'.$item->id.'?status=Proses') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-danger">Proses</a>
                                        
                                        <a href="{{ url('change-status/'.$item->id.'?status=Tolak') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-primary">Selesai</a>
                                    </div>
                                </td>
                                            
                                <td class="text-sm">
                                    <a href="{{ route('service.edit', $item->id) }}" class="mx-3"
                                        data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                </td>
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
    <!-- Modal -->
@endsection
