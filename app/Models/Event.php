<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\Place;


class Event extends Model
{
    protected $fillable = [
        
        'name',
        'image_path',
        'description',    
        'category_id',        
        'start_time',
        'end_time',
        'place_id',
        'organizer_id',
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
