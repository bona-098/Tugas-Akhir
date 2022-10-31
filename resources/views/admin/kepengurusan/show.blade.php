@extends('admin.app')
@section('content')
    <section id="mc-profile" class="section">
        <div class="container">
            <div class="has-text-centered">
                <h3 class="is-size-3 is-uppercase has-text-dark">{{ $kepengurusan->nama }}</h3>
            </div>
            <form action="{{ route('kepengurusan.show', $kepengurusan->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('patch')
                <br>    
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table id="example" class="table table-flush" id="products-list">
        
                            <thead class="thead-light">
                                <tr>
                                    <th>Tahun</th>
                                    <th>Pembina</th>                            
                                    <th>Ketua</th>                            
                                    <th>Staff</th>                            
                                    <th>Program Kerja</th>                            
                                    <th>Prestasi</th>                            
                                    <th>Uang Masuk</th>                            
                                    <th>Uang Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <div>
                                        @foreach ($kepengurusan as $item)
                                        <td class="text-sm">{{ $kepengurusan->tahun }}</td>
                                        <td class="text-sm">{{ $kepengurusan->pembina }}</td>                           
                                        <td class="text-sm">{{ $kepengurusan->pembina }}</td>
                                        @endforeach
                                        @foreach ($prestasi as $item)
                                        <td class="text-sm">{{ $item->nama }}</td>                                                                    
                                        @endforeach
                                        @foreach ($programkerja as $item)
                                        <td class="text-sm">{{ $item->nama }}</td>
                                        @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </section>
@endsection