<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{


    protected $fillable = [
        'name',
        'text',
        'photo',
    ];
    

    public function dayoffs(): HasMany
    {
        return $this->hasMany(DayOff::class);
    }
}
