<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Event;


class Category extends Model
{
    protected $table = 'categoris';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
