<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest', ['except' => 'destroy']);
    // }

    // public function logout(){
    //     auth()->logout();
    //     return redirect()->route('teams-index');
    // }

    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt(request(['email', 'password']))) {

            return back()->withErrors(['message' => 'Bad credentials. Please try again']);

        } else {

            if(auth()->user()->is_verified) {

                return redirect()->route('teams.index');

            } else {

                $this->destroy();

                return back()->withErrors(['message' => 'You are not verified, please check your email for verification!']);

            }
        }


         // return redirect('/teams');
    }

    public function verification($id)
    {
        $user = User::findOrFail($id);

        $user->is_verified = true;
        $user->save();

        return view('auth.verification',compact('user'));
    }

    public function destroy () {

        auth()->logout();

        return redirect()->route('login');

    }    

}
