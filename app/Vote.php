<?php

namespace App;

class Vote extends BaseModel
{
    protected $fillable = ['student_id', 'tutor_id', 'direction'];

    protected $rules = [
        'student_id' => 'required|integer',
        'tutor_id' => 'required|integer',
        'direction' => 'required|integer',
    ];

    protected function tutor()
    {
        return $this->belongsTo('App\User', 'tutor_id');
    }

    protected function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

}


