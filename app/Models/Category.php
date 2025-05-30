<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Event;


class Category extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'image_path',
        'created_at',
        'updated_at',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
