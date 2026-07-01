<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
</head>
<body class="auth-page register-page">

    <div class="form-box">

        <h1>Đăng ký</h1>
        <p>Tạo tài khoản mới để sử dụng hệ thống.</p>

        @if(session('message'))
            <div class="alert-success">
                {{ session('message') }}
            </div>
        @endif

        <livewire:register />

        <div class="links">
            <a href="{{ route('login') }}">Đăng nhập</a>
        </div>

    </div>

    @livewireScripts
</body>
</html>