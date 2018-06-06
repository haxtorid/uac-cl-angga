<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function composes()
    {
        return $this->hasMany('App\Compose','id','user_id');
    }

    public function inbox() 
    {
        return $this->hasMany('App\InBox','id','user_id');
    }

    public function sentbox() 
    {
        return $this->hasMany('App\SentBox','id','user_id');
    }
}
