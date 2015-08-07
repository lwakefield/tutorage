<?php
namespace App\Http\Controllers;

use App\Subreddit;

class HomeController extends Controller
{

    public function index()
    {
        $subs = Subreddit::paginate(12);
        foreach ($subs as $sub) {
            $sub->load(['posts' => function ($query) {
                $query->limit(5);
            }]);
        }
        return view('home')
            ->with(['subs' => $subs]);
        
    }
}
