<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'description',    
        'category_id',        
        'start_time',
        'end_time',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function places()
    {
        return $this->belongsTo(Place::class);
    }
}
