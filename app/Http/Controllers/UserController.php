<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        // return view('users.index',['user'-> $user]);
        return view('teams.index',compact('user'));
    }
}
