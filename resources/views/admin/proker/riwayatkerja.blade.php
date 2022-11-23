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
        <div class="button mb-3">
            <h4>Riwayat program kerja</h4>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="products-list">

                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Penanggung jawab</th>
                            <th>Pengurus</th>
                            <th>Landasan kegiatan</th>
                            <th>Tujuan kegiatan</th>
                            <th>Objek segmentasi</th>
                            <th>Deskripsi</th>
                            <th>Parameter keberhasilan</th>
                            <th>Kebutuhan dana</th>
                            <th>Sumber dana</th>
                            <th>Sumlah sdm</th>
                            <th>Kebutuhan lain</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($proker->where('status', 'selesai') as $item)
                        {{-- @dd($item->divisi) --}}
                            <tr>
                                <td class="text-sm">{{ $item->nama }}</td>
                                {{-- <td class="text-sm">{{ $item->divisi->nama }}</td>
                                <td class="text-sm">{{ $item->kepengurusan->nama }}</td> --}}
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
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('proker.show', $item->id) }}"><i
                                                    class="fa fa-eye"></i> show</a>
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
@endsection
