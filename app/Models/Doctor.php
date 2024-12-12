<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'specialization',
        'phone',
        'is_active',
        
    ];
  
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->hasOne(User::class); // Один доктор связан с одним пользователем
    }
    public function dayoffs(): HasMany
    {
        return $this->hasMany(DayOff::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service', 'doctor_id', 'service_id');
    }
}
