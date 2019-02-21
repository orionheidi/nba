<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;
use App\User;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(CreateCommentRequest $request, $teamId)
    {
        $team = Team::findOrFail($teamId);
       
        // $request->validate([
        //     'content' => 'required | min:10',
        // ]);
     
        // $this->validate(request(), Comment::STORE_RULES);

        // $commentTeam = $team->comments()->request()->all();
        Comment::create([
            'content' => $request->get('content'),
            'team_id' => $team->id,
            'user_id' => Auth::user()->id,
        ]);

        // return $comment;

        // if ($post->user) {
        //     \Mail::to($post->user)->send(new CommentReceived(
        //         $post, $comment
        //     ));
        // }
        return redirect(route('teams-show', [ 'id' => $teamId ]));
    }
}
