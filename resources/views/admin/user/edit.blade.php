@extends('admin.app')
@section('content')
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
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5">
                        <h4>Kelola User</h4>
                    </div>
                        <form action="{{ route('kelola.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                                    <br>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>password</label>
                                    <input class="form-control" type="password" name="password"
                                        value="{{ $user->password }}">
                                </div>
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control" id="role">
                                            <option value="#" selected disabled>Pilih role...</option>
                                            <option value="su">super admin</option>
                                            <option value="admin">admin</option>
                                            <option value="teknisi">teknisi</option>
                                            <option value="user">user</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                    </div>
                    <div class="row ml-2 mb-5">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a button class="btn btn-dark" href="/kelola">Batal</button></a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript">
        $('#foto').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script> --}}
@endsection
