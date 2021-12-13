<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'name','url','url_type','enunciation','description','materials',
    ];



    public function track_activity(){
        return $this->hasMany(Tracking_activity::class, 'activity_id', 'id');
    }

}
