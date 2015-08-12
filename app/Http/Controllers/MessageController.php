<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\ValidationException;
use App\Factories\CrudRepositoryFactory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->message_repo = CrudRepositoryFactory::make('Message');
    }

    public function postSendMessage()
    {
        try {
            Input::merge([
                'from_id' => Auth::user()->id
            ]);
            $message = $this->message_repo->create();
            return back();
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
    }

}

