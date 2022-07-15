@extends('admin.app')
@section('content')
<div class="container border">
    <div class="d-grid gap-1">
        <a button type="button" class="btn btn-primary" id="liveToastBtn" href="{{ route('admin-prestasi.create') }}">Tambah prestasi</a>
    </div>
    <div class="card-body px-0 pb-0">
        <div class="table-responsive border">
            <table class="table table-flush" id="products-list">
                
                <thead class="thead-light">
                    <tr>
                        <th>Media</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Waktu</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($prestasi as $item)
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex">                                
                                <div class="pic"><img src="{{ asset('prestasi/foto/' .$item->foto) }}" class="img-fluid" width="80" height="80" alt="pp"></div>
                            </div>
                        </td>
                        <td class="text-sm">{{ $item->nama }}</td>
                        <td class="text-sm">{{ $item->nim }}</td>                        
                        <td class="text-sm">{{ $item->waktu}}</td>
                        <td class="text-sm">
                            <a href="admin-prestasi-detail" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                <i class="fas fa-eye text-secondary"></i>
                            </a>
                            <a href="{{ route('admin-prestasi.edit', $item->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                <i class="fas fa-user-edit text-secondary"></i>
                            </a>
                            <form action="{{ route('admin-prestasi.destroy', $item->id) }}" method="POST">
                                @method('DELETE')                        
                                @csrf
                                <button type="submit" class="badge bg-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
