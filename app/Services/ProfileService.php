<?php

namespace App\Services;

use App\Conversation;
use Auth;

class ProfileService
{

    public static function loadMyConversations()
    {
        $user = Auth::user();
        $sent = $user->sent->groupBy('to_id');
        $received = $user->received->groupBy('from_id');
        $conversations = $sent->map(function($item, $key) use ($received) {
            foreach ($received->get($key, collect())->all() as $message) {
                $item = $item->push($message);
            }
            $item = $item->sortBy('created_at');
            return new Conversation($key, $item);
        });
        return $conversations->values();
    }
    

}
