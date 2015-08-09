<?php

namespace App;

class Role extends BaseModel
{
    protected $fillable = ['name'];

    protected $rules = [
        'name' => 'required',
    ];

    protected function users()
    {
        
    }

}
