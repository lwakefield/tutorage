<?php
namespace App\Http\Controllers;

use App\Subreddit;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
}
