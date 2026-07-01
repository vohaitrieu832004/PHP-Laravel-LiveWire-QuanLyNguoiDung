<div>
    @if (session()->has('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="register">
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" wire:model="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" wire:model="password_confirmation">
        </div>

        <button type="submit">Đăng ký</button>
    </form>
</div>