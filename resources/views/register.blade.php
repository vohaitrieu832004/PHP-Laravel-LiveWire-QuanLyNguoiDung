<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('postRegister') }}">
            @csrf
            <label for="name">Họ và tên</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nguyễn Văn A" required>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required>

            <label for="password">Mật khẩu</label>
            <input id="password" type="password" name="password" placeholder="Nhập mật khẩu" required>

            <label for="password_confirmation">Xác nhận mật khẩu</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
 
            <button type="submit">Đăng ký</button>
        </form>

        <div class="links">
            <a href="{{ route('login') }}">Đăng nhập</a>
        </div>
    </div>
</body>
</html>
