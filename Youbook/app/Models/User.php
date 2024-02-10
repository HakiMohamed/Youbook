<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function hasRole($role)
{
    return $this->roles()->where('name', $role)->exists();
}



public function roles()
{
    return $this->belongsToMany(Role::class);
}


    protected $fillable = [
        'name', 'email', 'password',
    ];
}
