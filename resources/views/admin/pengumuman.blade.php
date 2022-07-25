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
                href="{{ route('admin-pengumuman.create') }}">Buat Pengumuman</a>
        </div>
        <div class="card-body px-0 pb-0 border">
            <div class="table-responsive border">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumuman as $item)
                            <tr>
                                <td class="text-sm">{{ $item->judul }}</td>
                                <td class="text-sm">{{ $item->deskripsi }}</td>
                                <td class="text-sm">{{ $item->waktu }}</td>

                                {{-- <td><span class="badge badge-danger badge-sm">pending</span></td> --}}
                                <td class="text-sm">
                                    <a href="admin-pengumuman-detail" data-bs-toggle="tooltip"
                                        data-bs-original-title="Preview product">
                                        <i class="fas fa-eye text-secondary"></i>
                                    </a>
                                    <a href="{{ route('admin-pengumuman.edit', $item->id) }}" class="mx-3"
                                        data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <form action="{{ route('admin-pengumuman.destroy', $item->id) }}" method="POST">
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
@endsection
