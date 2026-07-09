<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phiếu đề nghị</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body class="home-page">

    <header class="site-header">
        <div class="container navbar">
            <a class="logo" href="{{ route('home') }}">
                <img src="https://sgfoods.com.vn/sites/all/themes/sgfood/logo.png" alt="Logo SaiGonFood">
                SaiGonFood
            </a>
            <nav class="menu">
                <span style="font-weight:600;">{{ auth()->user()->name }} — {{ auth()->user()->department?->department_name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="button">Đăng xuất</button>
                </form>
            </nav>
        </div>
    </header>

    <main>
        <div class="container" style="padding: 30px 0;">
            <h2 style="margin-bottom:20px; color:#0a6b42;">📋 Danh sách phiếu đề nghị — {{ auth()->user()->department?->department_name }}</h2>
            <livewire:manager-request />
        </div>
    </main>

    @livewireScripts
</body>
</html>