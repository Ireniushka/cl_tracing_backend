<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    protected $table = 'pupils';

    public $timestamps = false;

    protected $fillable = [
        'dni','name','last_name','course',
    ];


    public function relations(){
        return $this->hasMany(Relation::class);
    }

    public function track_activities(){
        return $this->hasMany(Tracking_activity::class);
    }

    public function track_tests(){
        return $this->hasMany(Tracking_test::class);
    }
}
