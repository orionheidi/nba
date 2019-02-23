<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailLink;

class RegisterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_verified' => false,
        ]);
        Mail::to($request->email)->send(new SendEmailLink($user));

         return redirect('/login');
        // return redirect(route('teams.index'));
        
    }
}
