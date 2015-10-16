<?php

namespace App\Services;

use App\Conversation;
use Auth;

class ProfileService
{

    public static function loadMyConversationsStudent()
    {
        $user = Auth::user();
        $sent = $user->sent->groupBy('to_id');
        $received = $user->received->groupBy('from_id');
        $conversations = $sent->map(function($item, $key) use ($received) {
            $with_user = $item->count() ? $item->first()->to : $received->first()->from;
            foreach ($received->get($key, collect())->all() as $message) {
                $item = $item->push($message);
            }
            $item = $item->sortBy('created_at');
            return new Conversation($with_user, $item);
        });
        return $conversations->values();
    }

    public static function loadMyConversationsTutor()
     {
        $user = Auth::user();
        $sent = $user->sent->groupBy('to_id');
        $received = $user->received->groupBy('from_id');
        $conversations = $received->map(function($item, $key) use ($received) {
            $with_user = $item->count() ? $item->first()->to : $received->first()->from;
            foreach ($received->get($key, collect())->all() as $message) {
                $item = $item->push($message);
            }
            $item = $item->sortBy('created_at');
            return new Conversation($with_user, $item);
        });
        return $conversations->values();
    }

    

}
