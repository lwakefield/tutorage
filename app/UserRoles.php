<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends BaseModel
{
    protected $table = "user_roles";
    public $timestamps = false;
    protected $fillable = ['user_id', 'role_id'];
    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'role_id' => 'required|exists:roles,id'
    ];
}
