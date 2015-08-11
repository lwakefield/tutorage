<?php
namespace App\Http\Controllers;

use Auth;
use App\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $subjects = Subject::all();
            if ($user->hasRole('tutor')) {
                $my_subjects = Auth::user()->subjects;
                return view('tutor-app')->with(compact('subjects', 'my_subjects'));
            }
            elseif ($user->hasRole('student')) {
                $tutors = session('tutors');
                return view('student-app')->with(compact('subjects', 'tutors'));
            }
        }
        return view('home');
    }
}
