<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'id',
        'name',
        'ville',
        'capacity',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
