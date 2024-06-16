<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SILAMAs</title>

    <link rel="shortcut icon" href="/template/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/auth.css">
</head>

<body>
    <script src="/template/dist/assets/static/js/initTheme.js"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html">Humas Politala</a>
                    </div>
                    <h1 class="auth-title">Login</h1>
                    <p class="auth-subtitle mb-5">Login dengan akun yang sudah anda daftarkan</p>

                    @if (session('loginError'))
                        <div class="alert alert-danger"><i class="bi bi-file-excel"></i> {{ session('loginError') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success"><i class="bi bi-file-excel"></i> {{ session('success') }}</div>
                    @endif

                    <form action="{{ url('login/store') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" autofocus required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Login</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum Punya Akun? <a href="{{ url('registrasi') }}" class="font-bold">Daftar</a>.</p>
                        <p><a class="fw-lighter" href="{{ url('lupa-password') }}">Lupa Password</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>

</html>
