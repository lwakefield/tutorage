<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends BaseModel
{
    protected $table = 'votes';
    protected $fillable = ['direction', 'user_id'];
    protected $rules = [
        'direction' => 'required|integer',
        'user_id' => 'required|integer|exists:users,id',
    ];

    public function voteable()
    {
        return $this->morphTo();
    }
}
