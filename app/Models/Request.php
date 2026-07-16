<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id',
        'request_type_id',
        'processing_department_id',
        'machine_location',
        'description',
        'priority',
        'request_date',
        'status',
        'completed_at',
        'reject_reason',
        'result',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestType()
    {
        return $this->belongsTo(RequestType::class);
    }

    public function processingDepartment()
    {
        return $this->belongsTo(Department::class, 'processing_department_id');
    }

    public function detail()
    {
        return $this->hasOne(RequestDetail::class);
    }
}