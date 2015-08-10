<?php

namespace App;

class Subject extends BaseModel
{
    protected $fillable = ['code', 'name'];

    protected $rules = [
        'code' => 'required',
        'name' => 'required',
    ];

    protected function users()
    {
        return $this->belongsToMany('App\User', 'user_subjects');
    }

    public function getFullNameAttribute()
    {
        return $this->code.': '.$this->name;
    }
    

}

