<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use App\Models\Tecket;

class Event extends Model
{
    protected $fillable = [
        'id',
        'name',
        'image_path',
        'start_time',
        'end_time',
        'category_id',
        'organizer_id',
        'location_id',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function place()
    {
        return $this->belongsTo(Place::class , 'location_id');
    }
    public function organizer()
    {
        return $this->belongsTo(User::class );
    }
    public function teckets()
    {
        return $this->hasMany(Tecket::class, 'event_id');
    }
    
}
