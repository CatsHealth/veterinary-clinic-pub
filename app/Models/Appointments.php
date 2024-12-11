<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointments extends Model
{
    use SoftDeletes; 

    protected $fillable = [
        'id_service',
        'date',
        'time',
        'name',
        'phone'
    ];

    protected $dates = ['deleted_at'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
