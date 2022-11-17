@extends('admin.app')
@section('content')
    <section id="mc-profile" class="section">
        <div class="container">
            <div class="has-text-centered">
                <h3 class="is-size-3 is-uppercase has-text-dark">Kepengurusan {{ $kepengurusan->tahun }}</h3>
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
                                    <th>Nama</th>
                                    <th>Tahun</th>
                                    <th>Pembina</th>
                                    <th>Prestasi</th>
                                    <th>Program Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <div>
                                        <td class="text-sm">{{ $kepengurusan->nama }}</td>
                                        <td class="text-sm">{{ $kepengurusan->tahun }}</td>
                                        <td class="text-sm">{{ $kepengurusan->pembina }}</td>
                                        <td class="text-sm">
                                            @foreach ($kepengurusan->prestasi as $colab)
                                                <li>{{ $colab->nama_kegiatan }}</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($kepengurusan->programkerja as $colabs)
                                                <li>{{ $colabs->nama }}, </li>
                                            @endforeach
                                        </td>
                                        </td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
@endsection
