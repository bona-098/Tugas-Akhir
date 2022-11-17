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
                            <th>user</th>
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
                        @foreach ($service->where('status', 'proses') as $item)
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
                                    @if($item->status=='proses')
                                    <a href="{{ url('change-status/'.$item->id.'status?terima') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success" type="hidden">Proses</a>
                                    @elseif ($item->status=='selesai')
                                    <a href="{{ url('change-status/'.$item->id.'status?selesai') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-primary">selesai</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="text-center">
                                    
                                        {{-- <a href="{{ url('change-status/'.$item->id.'?status=terima') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Terima</a> --}}
                                        <a href="{{ url('change-status/'.$item->id.'?status=selesai') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-primary">Selesai</a>
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
