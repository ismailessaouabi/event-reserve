<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'role',
        'name',        
        'email',
        'password',
        'phone',
        'city',
        'country',
        'address',
        'postal_code',
        'nom_entreprise',
        'profile_picture',

        
        
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
