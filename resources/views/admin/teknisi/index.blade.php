@extends('admin.app')
@section('content')
<div class="container border">
    <div class="d-grid gap-1">
        <a button type="button" class="btn btn-primary" id="liveToastBtn" href="#">Tambah Teknisi</a>
    </div>
    <div class="card-body px-0 pb-0">
        <div class="table-responsive border">
            <table class="table table-flush" id="products-list">
                
                <thead class="thead-light">
                    <tr>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Jadwal</th>                        
                        <th>No_hp</th>
                        <th>action</th>
                    </tr>
                </thead>
                {{-- @foreach ($prestasi as $item) --}}
                <tbody>
                    <tr>
                        <td class="text-sm">Bona Matanari</td>
                        <td class="text-sm">11181019</td>                        
                        <td class="text-sm">senin (s1)</td>
                        <td class="text-sm">085348409442</td>                        
                        <td class="text-sm">
                            <a href="admin-prestasi-detail" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                <i class="fas fa-eye text-secondary"></i>
                            </a>
                            <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                <i class="fas fa-user-edit text-secondary"></i>
                            </a>
                            <form action="#" method="POST">
                                {{-- @method('DELETE')                        
                                @csrf --}}
                                <button type="submit" class="badge bg-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                {{-- @endforeach --}}
            </table>
        </div>
    </div>
</div>
@endsection
