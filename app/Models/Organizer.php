<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    // Define the fillable attributes
    protected $fillable = [
        'name',
        'description',
        'location',
        'image_path',
        'contact_info',
        'website',
        
    ];
}
