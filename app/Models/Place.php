<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'image_path',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
