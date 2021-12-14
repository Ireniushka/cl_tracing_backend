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

    protected $primaryKey = 'dni';
    public $incrementing = false;

    protected $fillable = [
        'dni','type','name','last_name','username',
    ];

    protected $hidden = [
        'passChanged','password', 'remember_token',
    ];

    public function legal_tutor(){
        return $this->hasMany(Tutelage::class, 'legal_tutor_id', 'dni');
    }

    public function counselor(){
        return $this->hasMany(Orientation::class, 'counselor_id', 'dni');
    }
}
