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
                                        @foreach ($kepengurusan as $pengurus)
                                            <td class="text-sm">{{ $kepengurusan->nama }}</td>
                                            <td class="text-sm">{{ $kepengurusan->tahun }}</td>
                                            <td class="text-sm">{{ $kepengurusan->pembina }}</td>
                                            @foreach ($pengurus as $k => $l)
                                                <td class="text-sm">{{ $l->programkerja->nama }}</td>
                                                <td class="text-sm">{{ $l->prestasi->nama }}</td>
                                            @endforeach
                                        @endforeach
                                        </td>
                                        
                                    </div>
                                    {{-- <div>
                                        
                                        @foreach ($kepengurusan as $pengurus)
                                                <td class="text-sm">{{ $kepengurusan->nama }}</td>
                                                <td class="text-sm">{{ $kepengurusan->tahun }}</td>
                                                <td class="text-sm">{{ $kepengurusan->pembina }}</td>
                                                @foreach ($pengurus as $item)
                                                    <td class="text-sm">{{ $item->programkerja->nama }}</td>
                                                    <td class="text-sm">{{ $item->prestasi->nama }}</td>
                                                @endforeach
                                        @endforeach --}}
                    </div>
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
