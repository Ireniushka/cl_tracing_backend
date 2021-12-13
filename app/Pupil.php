<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    protected $table = 'pupils';

    protected $primaryKey = 'dni';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'dni','name','last_name','course','counselor_id',
    ];


    public function tutelage(){
        return $this->hasMany(Tutelage::class, 'pupil_id', 'dni');
    }

    //??
    public function counselor(){
        return $this->hasOne(Orientation::class, 'counselor_id', 'dni');
    }

    public function track_activity(){
        return $this->hasMany(Tracking_activity::class, 'pupil_id', 'dni');
    }

    public function track_test(){
        return $this->hasMany(Tracking_test::class, 'pupil_id', 'dni');
    }
}
