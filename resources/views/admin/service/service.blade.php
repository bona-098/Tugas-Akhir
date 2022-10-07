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
                href="{{ route('service.create') }}">Tambah Jadwal</a>
        </div>
        <div class="card-body px-0 pb-0 border">
            <div class="table-responsive border">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Hari</th>
                            <th>Sesi</th>
                            <th>No_hp</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $item)
                            <tr>
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->nim }}</td>
                                <td class="text-sm">{{ $item->hari }}</td>
                                <td class="text-sm">{{ $item->sesi }}</td>
                                <td class="text-sm">{{ $item->no_hp }}</td>
                                <!-- <td class="text-sm">pending</td> -->
                                <td class="text-sm"><?php if ($item->status == null) echo 'Pending';?><?php echo $item->status; ?></td>
                                {{-- <td><span class="badge badge-danger badge-sm">pending</span></td> --}}
                                <td class="text-sm">
                                    <a href="{{ route('service.edit', $item->id) }}" class="mx-3"
                                        data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <form action="{{ route('service.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="badge bg-danger">delete</button>
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
