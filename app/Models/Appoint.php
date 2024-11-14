<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appoint extends Model
{
    protected $fillable = [
        'service',
        'date',
        'time',
        'name',
        'phone'

    ];

}
