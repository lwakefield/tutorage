<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Factories\CrudRepositoryFactory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class VoteController extends Controller
{

    public function __construct()
    {
        $this->commentRepo = CrudRepositoryFactory::make('Comment');
        $this->postRepo = CrudRepositoryFactory::make('Post');
        $this->voteRepo = CrudRepositoryFactory::make('Vote');
    }

    public function voteOnPost($id)
    {
        $post = $this->postRepo->retrieve($id);
        return $this->voteOnModel($post);
    }

    public function voteOnComment($id)
    {
        $comment = $this->commentRepo->retrieve($id);
        return $this->voteOnModel($comment);
    }

    protected function voteOnModel($parent)
    {
        Input::merge(['user_id' => Auth::id()]);
        $vote = $this->voteRepo->updateOrCreate([
            'voteable_type' => get_class($parent),
            'voteable_id' => $parent->id,
            'user_id' => Auth::id()
        ]);
        $parent->votes()->save($vote);

        $up_votes = $parent->votes()->where('direction', '>', '0')->count();
        $down_votes = $parent->votes()->where('direction', '<', '0')->count();
        $parent->score = $up_votes - $down_votes;
        $parent->save();

        return redirect()->back();
    }
}
