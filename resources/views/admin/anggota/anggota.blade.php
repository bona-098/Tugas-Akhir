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
    <div class="container-mb5">
        <h4 class="row mb-5 m-2">Staff diterima</h4>
        {{-- <div class="button mb-3">s --}}

        <div class="table-responsive">
            <table class="table table-flush" id="products-list">

                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Motivasi</th>
                        <th scope="col">Komitmen</th>
                        <th scope="col">CV</th>
                        <th scope="col">Portofolio</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar->where('status', 'anggota') as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->divisi->nama }}</td>
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
                                        <form action="{{ route('anggota.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
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
                    "searchPlaceholder": "Cari nama",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        });
    </script>
    {{-- @endpush --}}
@endsection
