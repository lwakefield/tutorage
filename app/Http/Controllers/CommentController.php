<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\ValidationException;
use App\Factories\CrudRepositoryFactory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->commentRepo = CrudRepositoryFactory::make('Comment');
        $this->postRepo = CrudRepositoryFactory::make('Post');
    }

    public function commentOnPost($id)
    {
        $post = $this->postRepo->retrieve($id);
        return $this->commentOnModel($post);
    }

    public function commentOnComment($id)
    {
        $comment = $this->commentRepo->retrieve($id);
        return $this->commentOnModel($comment);
    }

    protected function commentOnModel($parent)
    {
        try {
            Input::merge(['user_id' => Auth::id()]);
            $comment = $this->commentRepo->create();
            $parent->comments()->save($comment);
            return redirect()->back();
        } catch (ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
   }
}
