<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Request;
use App\Models\RequestDetail;
use App\Models\RequestType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateRequest extends Component
{
    // Form chung
    public $request_type_id = '';
    public $processing_department_id = '';
    public $machine_location = '';
    public $description = '';
    public $priority = '';
    public $request_date = '';

    // Form chi tiết 
    public $machine_name = '';
    public $specification = '';
    public $unit = '';
    public $quantity = '';
    public $note = '';

    public function save()
    {
        $this->validate([
            'request_type_id' => 'required',
            'processing_department_id' => 'required',
            'machine_location' => 'required|string|max:255',
            'description' => 'required',
            'priority' => 'required',
            'request_date' => 'required|date',
            'machine_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $request = Request::create([
            'user_id' => Auth::id(),
            'request_type_id' => $this->request_type_id,
            'processing_department_id' => $this->processing_department_id,
            'machine_location' => $this->machine_location,
            'description' => $this->description,
            'priority' => $this->priority,
            'request_date' => $this->request_date,
            'status' => 'Chờ phê duyệt',
        ]);

        RequestDetail::create([
            'request_id' => $request->id,
            'machine_name' => $this->machine_name,
            'specification' => $this->specification,
            'unit' => $this->unit,
            'quantity' => $this->quantity,
            'note' => $this->note,
        ]);

        $this->reset();
        session()->flash('message', 'Tạo phiếu đề nghị thành công!');
    }

    public function render()
    {
        return view('livewire.create-request', [
            'requestTypes' => RequestType::all(),
            'departments' => Department::all(),
        ]);
    }
}