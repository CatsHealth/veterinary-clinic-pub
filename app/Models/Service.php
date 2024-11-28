<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'id_doctor',
        'price',
        'caption',
        'recommendation',
        'description',
        'isactive',
        'duration',
        'filename'

    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_service');
    }
}
