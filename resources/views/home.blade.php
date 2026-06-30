<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - SaiGonFood</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="home-page">
    <header class="site-header">
        <div class="container navbar">
            <a class="logo" href="{{ route('home') }}">
                <img src="https://sgfoods.com.vn/sites/all/themes/sgfood/logo.png" alt="Logo SaiGonFood">
                SaiGonFood
            </a>
                <nav class="menu">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="avatar-upload" style="cursor:pointer; display:flex; align-items:center; gap:10px;">
                            <div style="position:relative; width:50px; height:50px; border-radius:50%; overflow:hidden; border:2px solid #fff;">
                                <img src="{{ auth()->user()->avatar ? asset('storage/images/' . basename(auth()->user()->avatar)) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png' }}" 
                                    style="width:100%; height:100%; object-fit:cover;">
                            </div>
                            <div style="color:black; line-height:1.4;">
                                <small style="font-size:11px; opacity:0.8;">Đang đăng nhập</small>
                                <div style="font-weight:bold;">{{ auth()->user()->name }}</div>
                                <div style="font-size:12px; opacity:0.8;">{{ auth()->user()->email }}</div>
                                <small style="font-size:11px; text-decoration:underline;">Thêm ảnh</small>
                            </div>
                        </label>
                        <input type="file" id="avatar-upload" name="avatar" accept="image/png,image/jpeg,image/jpg,image/webp" style="display:none" onchange="this.form.submit()">
                    </form>

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
</body>
</html>
