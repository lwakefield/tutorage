<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;
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
    
    public function postFindTutors()
    {
        $subject = $this->subject_repo->retrieve(Input::get('subject_id'));
        $tutors = $subject->tutors;
        
        $maxPrice =  Input::get('max_price');
        if($maxPrice == "no-limit"){
            return redirect('/')->with(compact('tutors'));
        }
        else{
            $maxPrice = floatval($maxPrice);
            $i = 0;
            foreach ($tutors as $tutor) {
                if($tutor->price > $maxPrice){
                    $tutors->forget($i);
                }
                $i++;
            }
            return redirect('/')->with(compact('tutors'));
        }
        //return view('student-app')->with(compact('subjects', 'tutors'));
    }

}
