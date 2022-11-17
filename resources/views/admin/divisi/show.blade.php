<title>Detail Divisi : {{ $divisi->nama }}</title>
@extends('admin.app')
@section('content')
    <style>
        .title {
            font-size: large;
        }
    </style>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>sorry?</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    <section id="mc-profile" class="section">
        <div class="container">
            <div class="has-text-centered">
                <h3 class="is-size-3 is-uppercase has-text-dark">Divisi {{ $divisi->nama }}</h3>
            </div>
            <form action="{{ route('divisi.show', $divisi->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('patch')
                <br>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table id="example" class="table table-flush" id="products-list">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Kepala Divisi</th>
                                    <th>staff</th>
                                    <th>Program Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <div>
                                        <td class="text-sm">{{ $divisi->nama }}</td>
                                        <td class="text-sm">{{ $divisi->kadiv }}</td>
                                        <td class="text-sm">
                                            @foreach ($staff->where('status', 'anggota') as $s)
                                                <li>{{ $s->nama }}</p></li>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($proker as $item)
                                                <li>{{ $item->nama ?? 'jago' }}</li>
                                            @endforeach
                                        </td>

                                        </td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
            </form>
        </div>
        <br>
    </section>
@endsection