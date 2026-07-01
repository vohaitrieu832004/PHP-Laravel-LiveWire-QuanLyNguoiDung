<div>
    @if (session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="login">
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

        <button type="submit">Đăng nhập</button>
    </form>
</div>