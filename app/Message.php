<?php

namespace App;

class Message extends BaseModel
{
    protected $fillable = ['content', 'from_id', 'to_id'];

    protected $rules = [
        'content' => 'required',
        'from_id' => 'required|exists:users,id',
        'to_id' => 'required|exists:users,id',
    ];
    protected $with = ['from', 'to'];

    public function from()
    {
        return $this->hasOne('App\User', 'id', 'from_id');
    }

    public function to()
    {
        return $this->hasOne('App\User', 'id', 'to_id');
    }
}

