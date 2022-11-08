<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Saa</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <main>
        <div class="limiter">
            <div class="container-login">
                <div class="login-wrapper">
                    <div class="text-center">
                        <img src="assets/img/cutlogo.jpg" alt="logo">
                        <h1 class="login-title">Welcome</h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group mb-4">
                            <label for="name" :value="__('Name')">name</label>

                            <input id="name" class="form-control" type="text" name="name"
                                :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="form-group mb-4">
                            <label for="email" :value="__('Email')">email</label>

                            <input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required />
                        </div>

                        {{-- <div class="form-group mb4">
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" id="role">
                                    <option value="#" selected disabled>Pilih kategori</option>
                                    <option value="su">super admin</option>
                                    <option value="admin">admin</option>
                                    <option value="teknisi">teknisi</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                        </div> --}}

                        <!-- Password -->
                        <div class="form-group mb4">
                            <label for="password" :value="__('Password')">Password</label>

                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb4">
                            <label for="password_confirmation" :value="__('Confirm Password')">Konfirmasi Password</label>

                            <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required />
                        </div>

                        <div class="form-group mb-4">
                            <button class="btn btn-block login-btn">{{ __('Register') }}</button>
                        </div>
                    </form>
                    <a href="/forgot-password" class="forgot-password-link">Lupa Password?</a>
                    <p class="login-wrapper-footer-text">Belum Memiliki Akun? <a href="{{ route('login') }}"
                            class="text-reset">Daftar Disini</a></p>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
