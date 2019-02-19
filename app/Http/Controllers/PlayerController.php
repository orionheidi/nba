<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\User;

class PlayerController extends Controller
{
    public function show($id)
    {
        $user = auth()->user(); 
        $player = Player::findOrFail($id);
        // return $team;
        // \Log::info($id);
        return view('players.show',compact('player'));
    }
}
