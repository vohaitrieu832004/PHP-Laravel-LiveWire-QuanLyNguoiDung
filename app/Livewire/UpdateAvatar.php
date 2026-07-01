<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAvatar extends Component
{
    use WithFileUploads;

    public $avatar;

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $path = $this->avatar->store('images', 'public');

        /** @var User $user */
        $user = Auth::user();
        $user->update(['avatar' => $path]);

        $this->reset('avatar');

        session()->flash('avatar-message', 'Cập nhật ảnh đại diện thành công!');
    }

    public function render()
    {
        return view('livewire.update-avatar');
    }
}