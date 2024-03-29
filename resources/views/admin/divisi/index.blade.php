@extends('admin.app')
@section('content')
    <div class="container mb-5">
        <div class="button mb-3">
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('divisi.create') }}">Tambah Divisi</a>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="products-list">

                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>kadiv</th>
                            <th>visi</th>
                            <th>misi</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($divisi as $item)
                        <tbody>
                            <tr>
                                <div>
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->kadiv }}</td>
                                <td class="text-sm">{{ $item->visi }}</td>                                
                                <td class="text-sm">{{ $item->misi }}</td>
                                </a>
                                </div>                                                              
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('divisi.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="{{route('divisi.show',$item->id)}}"><i class="fa fa-edit"></i> show</a>
                                            <form action="{{route('divisi.destroy', $item->id)}}" method="POST">
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
                        </tbody>
                    @endforeach
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
                    "searchPlaceholder": "Cari nama divisi",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        });
    </script>
    @endsection
