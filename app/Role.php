<?php

namespace App;

class Role extends BaseModel
{
    protected $fillable = ['name'];
    public $timestamps = false;

    protected $rules = [
        'name' => 'required',
    ];

    protected function users()
    {
        return $this->belongsToMany('App\User', 'user_roles');
    }

}

