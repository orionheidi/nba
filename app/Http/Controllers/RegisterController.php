<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
            // 'age' => 'required|integer|min:1'
        ]);

        $data = $request->only(['email','name','password']);
        // return $data;
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        auth()->login($user);

        return redirect('/teams');
        // return redirect(route('teams.index'));
        
    }
}
