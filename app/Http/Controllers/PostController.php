<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Factories\CrudRepositoryFactory;
use App\Post;

use Auth;
use Input;

class PostController extends Controller
{
    public function __construct()
    {
        $this->repo = CrudRepositoryFactory::make('Post');
    }

    public function create($subreddit_id)
    {
        return view('post.create')->with('subreddit_id', $subreddit_id);
    }

    public function newPost($subreddit_id)
    {
        try {
            Input::merge(['user_id' => Auth::id()]);
            $post = $this->repo->create();
            return redirect('/p/'.$post->id);
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
   }

    public function show($id)
    {
        $post = $this->repo->retrieve($id);
        $post->comments;
        return view('post.show')->with('post', $post);
    }
}
