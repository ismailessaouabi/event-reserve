<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Tecket;
use App\Models\Event;
use App\Models\Socialmedia;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'city',
        'role',
        'profile_picture',
        'created_at',
        'updated_at',

        
        
    ];

public function teckets()
{
    return $this->hasMany(Tecket::class);


}
public function events()
{
    return $this->hasMany(Event::class , 'organizer_id');
}
public function socialmedias()
{
    return $this->hasMany(Socialmedia::class);
}

}
