<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    protected $fillable = ['email', 'name', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function getRulesAttribute() {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'password' => 'required|min:8'
        ];
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'user_roles');
    }
        
}
