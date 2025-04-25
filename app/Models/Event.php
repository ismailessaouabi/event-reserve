<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
        'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
