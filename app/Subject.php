<?php

namespace App;

class Subject extends BaseModel
{
    protected $fillable = ['code', 'name'];

    protected $rules = [
        'code' => 'required',
        'name' => 'required',
    ];

    public function tutors()
    {
        return $this->belongsToMany('App\User', 'tutor_subjects');
    }

    public function getFullNameAttribute()
    {
        return $this->code.': '.$this->name;
    }
    

}

