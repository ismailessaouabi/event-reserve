<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Event;
class Place extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'id',
        'name', // name for the place
        'city', // city of the place
        'capacity', // capacity of the place
        'created_at',
        'updated_at',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
