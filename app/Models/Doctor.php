<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'specialization',
        'phone',
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service');
    }
}
