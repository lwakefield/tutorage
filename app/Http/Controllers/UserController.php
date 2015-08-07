<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\ValidationException;
use App\Factories\CrudRepositoryFactory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->repo = CrudRepositoryFactory::make('User');
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister()
    {
        try {
            $user = $this->repo->create();
            Auth::login($user);
            return redirect('/');
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
    }

}
