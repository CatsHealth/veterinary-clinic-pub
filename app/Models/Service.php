<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Service extends Model
{
    use SoftDeletes;
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

    protected $dates = ['deleted_at'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_service');
    }
}
