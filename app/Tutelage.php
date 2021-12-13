<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutelage extends Model
{
    protected $table = 'tutelages';
    
    public $timestamps = false;

    protected $primaryKey = ['pupil_id','legal_tutor_id'];
    
    public $incrementing = false;

    protected $fillable = [
        'pupil_id','legal_tutor_id',
    ];
    

    public function pupil() {
        return $this->belongsTo(Pupil::class, 'pupil_id');
    }

    public function legal_tutor() {
        return $this->belongsTo(User::class, 'legal_tutor_id');
    }
}
