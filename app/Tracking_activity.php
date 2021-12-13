<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking_activity extends Model
{
    protected $table = 'tracking_activities';

    protected $fillable = [
        'pupil_id','activity_id','comment',
    ];

    public function pupil() {
        return $this->belongsTo(Pupil::class, 'pupil_id');
    }

    public function activity() {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
