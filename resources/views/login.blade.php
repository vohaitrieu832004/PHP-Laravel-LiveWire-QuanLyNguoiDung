<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="auth-page">
    <div class="form-box">
        <h1>Đăng nhập</h1>
        <p>Nhập thông tin tài khoản để tiếp tục.</p>

        @if(session('message'))
            <div class="alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('postLogin') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>

            <label for="password">Mật khẩu</label>
            <input id="password" type="password" name="password" placeholder="Nhập mật khẩu" required>

            <button type="submit">Đăng nhập</button>
        </form>

        <div class="links">
            <a href="{{ route('register') }}">Đăng ký</a>
        </div>
    </div>
</body>
</html>
