<?php

namespace App;

class Conversation
{

    public function __construct($with_user, $messages)
    {
        $this->with_user = $with_user;
        $this->messages = $messages;
    }
    
}
