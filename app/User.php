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
    protected $fillable = ['email', 'name', 'price', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function getRulesAttribute() {
        return [
            'name' => 'required',
            'price' => 'required',
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

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
    
    public function subjects()
    {
        if ($this->hasRole('tutor')) {
            return $this->belongsToMany('App\Subject', 'tutor_subjects');
        }
        return null;
    }

    public function sent()
    {
        return $this->hasMany('App\Message', 'from_id');
    }
    
    public function received()
    {
        return $this->hasMany('App\Message', 'to_id');
    }
}
