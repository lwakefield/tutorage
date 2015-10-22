<?php
namespace App\Http\Controllers;

use App\Exceptions\AccessException;
use App\Factories\CrudRepositoryFactory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Input;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->userRepo = CrudRepositoryFactory::make('User');
        $this->voteRepo = CrudRepositoryFactory::make('Vote');
    }

    protected function voteOnTutor()
    {
        $tutor = $this->userRepo->retrieve(Input::get('tutor_id'));
        if (!$tutor->hasRole('tutor')) {
            throw new AccessException('Cannot vote on non-tutor user');
        }
        Input::merge(['student_id' => Auth::id()]);
        $vote = $this->voteRepo->updateOrCreate([
            'student_id' => Auth::id()
        ]);
        $tutor->votes()->save($vote);
        $up_votes = $tutor->votes()->where('direction', '>', '0')->count();
        $down_votes = $tutor->votes()->where('direction', '<', '0')->count();
        $tutor->score = $up_votes - $down_votes;
        $tutor->save();
        return redirect()->back();
    }

}
