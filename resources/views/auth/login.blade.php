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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="email" :value="__('Email')" >Email</label>
                            
                            <input type="email" 
                            name="email" 
                            id="email" 
                            class="form-control"
                            placeholder="email@example.com">
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" :value="__('Password')"  >Password</label>
                            
                            <input type="password" 
                                    name="password" 
                                    id="password"
                                    required autocomplete="current-password"
                                    class="form-control"
                                placeholder="enter your passsword">
                        </div>
                        <input name="login" id="login" class="btn btn-block login-btn" type="submit"
                            value="Login">
                    </form>
                    <a href="#!" class="forgot-password-link">Lupa Password?</a>
                    <p class="login-wrapper-footer-text">Belum Memiliki Akun? <a href="#!"
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
