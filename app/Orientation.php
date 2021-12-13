<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orientation extends Model
{
    protected $table = 'orientations';

    public $timestamps = false;

    protected $primaryKey = 'pupil_id';
    public $incrementing = false;

    protected $fillable = [
        'pupil_id','counselor_id',
    ];
    

    public function pupil() {
        return $this->belongsTo(Pupil::class, 'pupil_id');
    }

    public function counselor() {
        return $this->belongsTo(User::class, 'counselor_id');
    }
}
