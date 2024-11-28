<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'id_service',
        'date',
        'time',
        'name',
        'phone',
        

    ];

}
