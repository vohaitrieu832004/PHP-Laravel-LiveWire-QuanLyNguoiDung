<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - SaiGonFood</title>
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
                <livewire:update-avatar />

                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="button">Đăng xuất</button>
                </form>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <h1>Bữa ăn tươi ngon cho mọi gia đình Việt</h1>
                    <p>SaiGonFood mang đến các sản phẩm thực phẩm chế biến tiện lợi, an toàn và phù hợp với nhịp sống hiện đại.</p>
                </div>
                <div class="hero-logo">
                    <img src="https://sgfoods.com.vn/sites/all/themes/sgfood/logo.png" alt="Logo công ty SaiGonFood">
                </div>
            </div>
        </section>

        <section class="blank-space"></section>
    </main>

    <footer class="site-footer">
        <div class="container">Công Ty Cổ Phần Sài Gòn Food</div>
    </footer>

    @livewireScripts
</body>
</html>