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
        $this->user_repo = CrudRepositoryFactory::make('User');
        $this->user_roles_repo = CrudRepositoryFactory::make('UserRoles');
        $this->role_repo = CrudRepositoryFactory::make('Role');
    }

    public function getSignup()
    {
        return view('user.create');
    }
    
    public function postSignup()
    {
        try {
            $user = $this->user_repo->create();
            $role = $this->role_repo->findWhere('name', '=', Input::get('user_type'));
            Input::merge([
                'user_id' => $user->id,
                'role_id' => $role->id
            ]);
            $this->user_roles_repo->create();
            Auth::login($user);
            return redirect('/');
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
    }

    public function upRating()
    {
        try {
            $tutor = $this->user_repo->retrieve(Input::get('tutor_id'));
            dd($tutor);
            //get current rating
            $currentRating = $tutor->rating;
            //increment current rating
            $newRating = $currentRating + 1;
            //post rating back to db
            $tutor->rating = $newRating;
            $tutor->save();
            return back();
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }

    }

    public function downRating()
    {
        try {
            $tutor = $this->user_repo->retrieve(Input::get('tutor_id'));
            //get current rating
            $currentRating = (int)$tutor->rating;
            //decrement current rating
            $newRating = $currentRating - 1;
            //post rating back to db
            $tutor->rating = $newRating;
            $tutor->save();
            return back();
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }

    }
}
