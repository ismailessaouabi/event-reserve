<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecket extends Model
{
    protected $table = 'billiets';
    // Define the fillable attributes
    protected $fillable = [
        'id',
        'price',
        'user_id',
        'event_id',
        'created_at',
        'updated_at'
        
        
    ];
    // Define the relationship with the Event model
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
