<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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
