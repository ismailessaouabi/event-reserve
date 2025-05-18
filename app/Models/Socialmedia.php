<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    protected $table = 'social_links';
    protected $fillable = ['name', 'facebook', 'twitter', 'linkedin', 'instagram', 'website', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
