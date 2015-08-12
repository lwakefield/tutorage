<?php

namespace App;

class Conversation
{

    public function __construct($with_id, $messages)
    {
        $this->with_user = User::find($with_id);
        $this->messages = $messages;
    }
    
}
