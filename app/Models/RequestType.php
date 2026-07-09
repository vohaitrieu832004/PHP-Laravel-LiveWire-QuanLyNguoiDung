<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    public $timestamps = false;

    protected $fillable = ['type_name'];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}