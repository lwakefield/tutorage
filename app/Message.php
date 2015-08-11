<?php

namespace App;

class Message extends BaseModel
{
    protected $fillable = ['content', 'from_id', 'to_id'];
    public $timestamps = false;

    protected $rules = [
        'content' => 'required',
        'from_id' => 'required|exists:users,id',
        'to_id' => 'required|exists:users,id',
    ];

    protected function from()
    {
        return $this->hasOne('App\User', 'id', 'from_id');
    }

    protected function to()
    {
        return $this->hasOne('App\User', 'id', 'to_id');
    }
}

