<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorSubjects extends BaseModel
{
    protected $table = "tutor_subjects";
    public $timestamps = false;
    protected $fillable = ['user_id', 'subject_id'];
    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'subject_id' => 'required|exists:subjects,id'
    ];
}
