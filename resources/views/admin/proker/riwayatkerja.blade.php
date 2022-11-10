@extends('admin.app')
@section('content')
    <div class="container border">
        <div class="button mb-3">
            <h1>riwayat</h1>
            <a button type="button" class="btn btn-primary" id="liveToastBtn" href="{{ route('proker.create') }}">Tambah
                Program kerja</a>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="products-list">

                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>penanggung_jawab</th>
                            <th>pengurus</th>
                            <th>landasan_kegiatan</th>
                            <th>tujuan_kegiatan</th>
                            <th>objek_segmentasi</th>
                            <th>deskripsi</th>
                            <th>parameter_keberhasilan</th>
                            <th>kebutuhan_dana</th>
                            <th>sumber_dana</th>
                            <th>Jumlah_sdm</th>
                            <th>Kebutuhan_lain</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($proker->where('status', 'selesai') as $item)
                        {{-- @dd('$item') --}}
                            <tr>
                                <td class="text-sm">{{ $item->nama }}</td>
                                <td class="text-sm">{{ $item->penanggung_jawab }}</td>
                                <td class="text-sm">{{ $item->pengurus }}</td>
                                <td class="text-sm">{{ $item->landasan_kegiatan }}</td>
                                <td class="text-sm">{{ $item->tujuan_kegiatan }}</td>
                                <td class="text-sm">{{ $item->objek_segmentasi }}</td>
                                <td class="text-sm">{{ $item->deskripsi }}</td>
                                <td class="text-sm">{{ $item->parameter_keberhasilan }}</td>
                                <td class="text-sm">{{ $item->kebutuhan_dana }}</td>
                                <td class="text-sm">{{ $item->sumber_dana }}</td>
                                <td class="text-sm">{{ $item->jumlah_sdm }}</td>
                                <td class="text-sm">{{ $item->kebutuhan_lain }}</td>
                                <td>
                                    @if ($item->status == 'selesai')
                                        <a href="{{ url('status/' . $item->id . '?status=selesai') }}"
                                            onclick="return confirm('Are you Sure?')"
                                            class="btn btn-sm btn-success">Selesai</a>
                                    @elseif ($item->status == 'monitoring')
                                        <a href="{{ url('status/' . $item->id . '?status=monitoring') }}"
                                            onclick="return confirm('Are you Sure?')"
                                            class="btn btn-sm btn-primary">Tolak</a>
                                    @endif
                                </td>
                                {{-- url('status/'.$item->id.'?status=monitoring')                      --}}
                                {{-- <td>
                                    <a href="{{ url('status/'.$item->id.'?status=selesai') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Setuju</a>
                                    
                                    <a href="{{ url('status/'.$item->id.'?status=monitoring') }}" onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-primary">Tolak</a>
                                    
                                </td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('proker.edit', $item->id) }}"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="{{ route('proker.show', $item->id) }}"><i
                                                    class="fa fa-edit"></i> show</a>
                                            <form action="{{ route('proker.destroy', $item->id) }}" method="POST">
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
                            @endforeach
                        </tbody>
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
                    "searchPlaceholder": "Cari nama pemesan",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        });
    </script>
@endsection
