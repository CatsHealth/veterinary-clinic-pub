<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function dayoffs(): HasMany
    {
        return $this->hasMany(DayOff::class);
    }
}
