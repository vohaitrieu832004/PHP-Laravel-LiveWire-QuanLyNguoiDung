<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body class="auth-page login-page">

    <div class="form-box">
        <h1>Đăng nhập</h1>

        @if(session('message'))
            <div class="alert-success">{{ session('message') }}</div>
        @endif

        <livewire:login />

        <div class="links">
            <a href="{{ route('register') }}">Đăng ký tài khoản mới</a>
        </div>
    </div>

    @livewireScripts
</body>
</html>