<?php
namespace App\Http\Controllers;

use App\Subreddit;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
}
