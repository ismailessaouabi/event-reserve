<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecket extends Model
{
    // Define the fillable attributes
    protected $fillable = [
        'prix',
        'event_id'
        
        
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
