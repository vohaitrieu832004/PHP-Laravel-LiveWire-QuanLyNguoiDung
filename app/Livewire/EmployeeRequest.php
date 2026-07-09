<?php

namespace App\Livewire;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeRequest extends Component
{
    public $updatingId = null;
    public $newStatus = '';
    public $result = '';

    public function openUpdate($id)
    {
        $this->updatingId = $id;
        $this->newStatus = '';
        $this->result = '';
    }

    public function closeUpdate()
    {
        $this->updatingId = null;
        $this->newStatus = '';
        $this->result = '';
    }

    public function update()
    {
        $this->validate([
            'newStatus' => 'required',
            'result' => 'required_if:newStatus,Hoàn thành|string|max:500',
        ]);

        $request = Request::where('id', $this->updatingId)
            ->where('processing_department_id', Auth::user()->department_id)
            ->firstOrFail();

        $data = ['status' => $this->newStatus];

        if ($this->newStatus === 'Hoàn thành') {
            $data['completed_at'] = now();
            $data['result'] = $this->result;
        }

        $request->update($data);

        $this->closeUpdate();
        session()->flash('message', 'Cập nhật trạng thái thành công!');
    }

    public function render()
    {
        $requests = Request::with(['user', 'user.department', 'requestType', 'detail'])
            ->where('processing_department_id', Auth::user()->department_id)
            ->where('status', '!=', 'Chờ phê duyệt')
            ->where('status', '!=', 'Từ chối')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.employee-request', compact('requests'));
    }
}