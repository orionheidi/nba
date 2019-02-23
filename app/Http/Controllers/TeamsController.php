<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;

class TeamsController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        $teams = Team::with('news')->paginate(1);
        return view('teams.index',compact('teams'));
    }

    public function show($id)
    {
        $user = auth()->user(); 
        $team = Team::with('news')->findOrFail($id);
        // \Log::info($id);
        return view('teams.show',compact('team'));
    }
}