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
    <div class="container-fluid">
        <h4 class="row mb-3 ml-2">Seleksi berkas</h4>
        <div class="table-responsive">
            <table class="table table-flush" id="products-list">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Pilihan pertama</th>
                        <th scope="col">Alasan pilihan pertama</th>
                        <th scope="col">Pilihan kedua</th>
                        <th scope="col">Alasan pilihan kedua</th>
                        <th scope="col">Pindah divisi</th>
                        <th scope="col">Motivasi</th>
                        <th scope="col">Komitmen</th>
                        <th scope="col">CV</th>
                        <th scope="col">Portofolio</th>
                        <th scope="col">Terima</th>
                        <th scope="col">Tolak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berkas->where('status', 'berkas') as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->divisi->nama }}</td>
                            <td>{{ $item->alasan_satu }}</td>
                            <td>{{ $item->pilihan_dua }}</td>
                            <td>{{ $item->alasan_dua }}</td>
                            <td>{{ $item->pindah_divisi }}</td>
                            <td>{{ $item->motivasi }}</td>
                            <td>{{ $item->komitmen }}</td>
                            <td>
                                <div>
                                    <a href="{{ asset('images/pendaftaran/cv/' . $item->cv) }}">
                                    {{ $item->cv }}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <a href="{{ asset('images/pendaftaran/protofolio/' . $item->cv) }}">
                                    {{ $item->portofolio }}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <form method="post" action="{{ route('wawancari', $item->id) }}" >
                                    @csrf                                    
                                    <input type="hidden" value="wawancara" name="status" >
                                    <button type="submit" class="btn btn-primary">Terima</button>                                        
                                </form>
                            </td>
                            <td>
                            <form action="{{ route('anggota.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Tolak</button>
                            </form>
                            </td>
                            {{-- <td>
                                <a href="{{ url('change-status/' . $item->id) }}" onclick="return confirm('Are you Sure?')"
                                    class="btn btn-sm btn-success">Diterima</a>

                                <a href="{{ url('change-status/' . $item->id) }}" onclick="return confirm('Are you Sure?')"
                                    class="btn btn-sm btn-danger">Ditolak</a>

                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @push('scripts') --}}

    <script>
        $(document).ready(function() {
            $('#products-list').DataTable({
                dom: 'lBfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, 100, 1000, -1],
                    ['5', '10', '25', '50', '100', '1000', 'All']
                ],

                language: {
                    "searchPlaceholder": "Cari nama kepengurusan",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        });
    </script>
    {{-- @endpush --}}
@endsection
