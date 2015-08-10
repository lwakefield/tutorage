<?php
namespace App\Http\Controllers;

use Auth;
use App\Subject;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $subjects = Subject::all();
            $my_subjects = Auth::user()->subjects;
            return view('home')->with(compact('subjects', 'my_subjects'));
        }
        return view('home');
    }
}
