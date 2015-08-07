<?php

namespace App\Http\Controllers;

use App\Subreddit;
use App\Post;
use App\Exceptions\ValidationException;
use App\Factories\CrudRepositoryFactory;

class SubredditController extends Controller
{

    public function __construct()
    {
        $this->repo = CrudRepositoryFactory::make('Subreddit');
    }

    public function create()
    {
        return view('subreddit.create');
    }

    public function newSubreddit()
    {
        try {
            $sub = $this->repo->create();
            return redirect('/r/'.$sub->id);
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
    }

    public function show($id)
    {
        $sub = $this->repo->retrieve($id);
        $posts = $this->getPostsFromSub($sub);
        $pagination_render = $this->getPaginationRenderFromSub($sub);
        return view('subreddit.show')->with([
            'sub' => $sub,
            'posts' => $posts,
            'pagination_render' => $pagination_render
        ]);
    }


    protected function getPostsFromSub($sub)
    {
        $posts = $sub->posts()->paginate();
        if ($posts->isEmpty()) {
            return [];
        }
        return array_combine(
            range($posts->firstitem(), $posts->lastitem()),
            $posts->items()
        );
    }

    protected function getPaginationRenderFromSub($sub)
    {
        return $sub->posts()->paginate()->render();
    }
}
