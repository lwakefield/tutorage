<?php
namespace App\Http\Controllers;

use Auth;
use App\Subject;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $subjects = Subject::all();
            
            if ($user->hasRole('tutor')) {
                $conversations = ProfileService::loadMyConversationsTutor();
                $my_subjects = Auth::user()->subjects;
                return view('tutor-app')->with(compact('subjects', 'my_subjects', 'conversations'));
            }
            elseif ($user->hasRole('student')) {
                $conversations = ProfileService::loadMyConversationsStudent();
                $tutors = session('tutors');
                return view('student-app')->with(compact('subjects', 'tutors', 'conversations'));
            }
        }
        return view('home');
    }
}
