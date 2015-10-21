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
            $with_user = $item->count() ? $item->first()->to : $received->first()->from;
            foreach ($received->get($key, collect())->all() as $message) {
                $item = $item->push($message);
            }
            $item = $item->sortBy('created_at');
            return new Conversation($with_user, $item);
        });
        $sent_keys = $sent->keys()->toArray();
        $received_keys = $received->keys()->toArray();
        $diff = array_diff($received_keys, $sent_keys);
        foreach ($diff as $i) {
            $item = $received->get($i);
            $conversations->push(new Conversation($item->first()->from, $item));
        }
        return $conversations->values();
    }
    

}
