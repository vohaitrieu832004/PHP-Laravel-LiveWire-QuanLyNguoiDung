<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    protected $fillable = [
        'request_id',
        'machine_name',
        'specification',
        'unit',
        'quantity',
        'note',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}