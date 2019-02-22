<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;
use App\User;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\CommentReceived;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('forbidden-comment')->only('store');
    }

    public function store(CreateCommentRequest $request, $teamId)
    {
        $team = Team::findOrFail($teamId);
       
        // $request->validate([
        //     'content' => 'required | min:10',
        // ]);
     
        // $this->validate(request(), Comment::STORE_RULES);

        // $commentTeam = $team->comments()->request()->all();
        $comment = Comment::create([
            'content' => $request->get('content'),
            'team_id' => $team->id,
            'user_id' => Auth::user()->id,
        ]);
       // dd($comment->user);
     

        if ($comment->team) {
            \Mail::to($comment->team)->send(new CommentReceived(
                $team, $comment
            ));
        }
        return redirect(route('teams-show', [ 'id' => $teamId ]));
    }
}
