<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking_test extends Model
{
    protected $table = 'tracking_tests';

    protected $fillable = [
        'pupil_id','lat_cruzada','comment',
    ];

    public function pupil() {
        return $this->belongsTo(Pupil::class, 'pupil_id');
    }
}
