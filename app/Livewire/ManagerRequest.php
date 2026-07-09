<?php

namespace App\Livewire;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManagerRequest extends Component
{
    public $rejectReason = '';
    public $rejectingId = null;

    // Mở modal nhập lý do từ chối
    public function openReject($id)
    {
        $this->rejectingId = $id;
        $this->rejectReason = '';
    }

    // Đóng modal từ chối
    public function closeReject()
    {
        $this->rejectingId = null;
        $this->rejectReason = '';
    }

    // Phê duyệt phiếu
    public function approve($id)
    {
        $request = Request::where('id', $id)
            ->whereHas('user', function ($q) {
                $q->where('department_id', Auth::user()->department_id);
            })
            ->firstOrFail();

        $request->update(['status' => 'Đã phê duyệt']);

        session()->flash('message', 'Phê duyệt phiếu thành công!');
    }

    // Từ chối phiếu
    public function reject()
    {
        $this->validate([
            'rejectReason' => 'required|string|max:500',
        ]);

        $request = Request::where('id', $this->rejectingId)
            ->whereHas('user', function ($q) {
                $q->where('department_id', Auth::user()->department_id);
            })
            ->firstOrFail();

        $request->update([
            'status' => 'Từ chối',
            'reject_reason' => $this->rejectReason,
        ]);

        $this->closeReject();
        session()->flash('message', 'Đã từ chối phiếu.');
    }

    public function render()
    {
        $requests = Request::with(['user', 'requestType', 'detail'])
            ->whereHas('user', function ($q) {
                $q->where('department_id', Auth::user()->department_id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.manager-request', compact('requests'));
    }
}