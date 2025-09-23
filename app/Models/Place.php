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
        'capacity', // capacity of the place
        'city', // city where the place is located
        'created_at',
        'updated_at',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
