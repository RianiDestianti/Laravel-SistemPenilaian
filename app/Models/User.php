<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the guru associated with the user.
     */
    public function guru()
    {
        return $this->hasOne(Guru::class, 'id_user');
    }

    /**
     * Get the murid associated with the user.
     */
    public function murid()
    {
        return $this->hasOne(Murid::class, 'id_user');
    }
}