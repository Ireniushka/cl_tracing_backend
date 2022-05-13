<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'relations';


    protected $fillable = [
        'pupil_id','user_id'
    ];


    public function pupil() {
        return $this->belongsTo(Pupil::class, 'pupil_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
