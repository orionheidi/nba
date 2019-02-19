<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;

class CommentsController extends Controller
{
    public function store($teamId)
    {
        $team = Team::findOrFail($teamId);
       
        // $request->validate([
        //     'author'=> 'required|max:5',
        //     'text' => 'required|min:30'
        // ]);
     
        $this->validate(request(), Comment::STORE_RULES);

        $commentTeam = $team->comments()->request()->all();
        $comment = Comment::create(
            array_merge(
                $commentTeam,
                ['user_id'=> auth()->user()->id]
            )
        );
        // return $comment;

        // if ($post->user) {
        //     \Mail::to($post->user)->send(new CommentReceived(
        //         $post, $comment
        //     ));
        // }
        return redirect(route('teams-show', [ 'id' => $teamId ]));
    }
}
