<div>
    <label for="avatar-upload" style="cursor:pointer; display:flex; align-items:center; gap:10px;" wire:loading.class="opacity-50">
        <div style="position:relative; width:50px; height:50px; border-radius:50%; overflow:hidden; border:2px solid #fff;">
            @if ($avatar)
                <img src="{{ $avatar->temporaryUrl() }}" style="width:100%; height:100%; object-fit:cover;">
            @else
                <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png' }}"
                    style="width:100%; height:100%; object-fit:cover;">
            @endif
        </div>
        <div style="color:black; line-height:1.4;">
            <small style="font-size:11px; opacity:0.8;">Đang đăng nhập</small>
            <div style="font-weight:bold;">{{ auth()->user()->name }}</div>
            <div style="font-size:12px; opacity:0.8;">{{ auth()->user()->email }}</div>
            <small style="font-size:11px; text-decoration:underline;" wire:loading.remove>Thêm ảnh</small>
            <small style="font-size:11px;" wire:loading>Đang tải lên...</small>
        </div>
    </label>

    <input type="file" id="avatar-upload" wire:model="avatar" accept="image/png,image/jpeg,image/jpg,image/webp" style="display:none">

    @if (session()->has('avatar-message'))
        <div class="alert-success">{{ session('avatar-message') }}</div>
    @endif

    @error('avatar') <div class="error">{{ $message }}</div> @enderror
</div>