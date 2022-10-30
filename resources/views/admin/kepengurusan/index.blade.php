@extends('admin.app')
@section('content')
<link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />
    <div class="container">
        <div class="mb-3">
            <a button type="button" class="btn btn-primary" id="liveToastBtn"
                href="{{ route('kepengurusan.create') }}">Tambah Kepengurusan</a>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table id="example" class="table table-flush" id="products-list">

                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>Pembina</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($kepengurusan as $item)
                        <tbody>
                            <tr>
                                <div>
                                {{-- <a href="oh/shiow/{{ $item->id }}">  --}}
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->tahun }}</td>
                                <td class="text-sm">{{ $item->pembina }}</td>                                
                                </a>
                                </div>                                                              
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('kepengurusan.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="{{route('kepengurusan.show',$item->id)}}"><i class="fa fa-edit"></i> show</a>
                                            <form action="{{route('kepengurusan.destroy', $item->id)}}" method="POST">
                                                @csrf   
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
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
@endsection
