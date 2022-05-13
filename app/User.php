<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'dni','type','name','last_name','username','email','passChanged','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function relations(){
        return $this->hasMany(Relation::class);
    }
}
