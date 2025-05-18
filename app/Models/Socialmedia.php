<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    protected $table = 'social_medias';
    protected $fillable = ['name', 'url', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
