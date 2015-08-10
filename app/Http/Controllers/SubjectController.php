<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\ValidationException;
use App\Factories\CrudRepositoryFactory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->user_subjects_repo = CrudRepositoryFactory::make('TutorSubjects');
        $this->subject_repo = CrudRepositoryFactory::make('Subject');
    }

    public function postNewSubject()
    {
        try {
            $subject = $this->subject_repo->create();
            return back();
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function postAddSubject()
    {
        try {
            Input::merge(array(
                'user_id' => Auth::user()->id
            ));
            $this->user_subjects_repo->create();
            return back();
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
    }
    

}
