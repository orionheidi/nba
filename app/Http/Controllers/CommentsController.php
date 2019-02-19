<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;

class CommentsController extends Controller
{
    public function store($teamId,$userId)
    {
        $team = Team::findOrFail($postId);
        $user = User::findOrFail($userId);
        // $request->validate([
        //     'author'=> 'required|max:5',
        //     'text' => 'required|min:30'
        // ]);
     
        $this->validate(request(), Comment::STORE_RULES);

        $commentTeam = $team->comments()->create(request()->all());
        $commentUser = $user->comments()->create(request()->all());
        $comment = array_merge($commentTeam, $commentUser);
        // return $comment;

        // if ($post->user) {
        //     \Mail::to($post->user)->send(new CommentReceived(
        //         $post, $comment
        //     ));
        // }
        return redirect(route('teams.show', [ 'id' => $teamId ],['id2' => $userId]));
    }
}
