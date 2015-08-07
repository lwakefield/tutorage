<?php

namespace App;

class Subreddit extends BaseModel
{
    
    protected $fillable = ['name', 'description'];
    protected $rules = [
        'name' => 'required',
        'description' => 'required'
    ];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}