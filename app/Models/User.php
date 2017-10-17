<?php

namespace App\Models;

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
    protected $table = 'sk_users';
    
    protected $fillable = [
        'username','fullname', 'email','phone', 'password','group','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function news()
    {
        return $this->hasMany('App\Models\News');
    }
     public function page()
    {
        return $this->hasMany('App\Models\Page');
    }
}
