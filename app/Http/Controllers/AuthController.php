<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function showloginform() {

        return view('auth.login');

    }

    public function showregisterform() {

        return view('auth.register');

    }

    public function store() {

        $this->validate(request(), [
            
            'name' => 'required',

            'email' => 'required|email',

            'password' => 'required|confirmed'
        ]);

        $user = User::create([ 

            'name' => request('name'),

            'email' => request('email'),

            'password' => bcrypt(request('password'))

        ]);

        auth()->login($user);

        session()->flash('message', 'Successfully logged in!');

        return redirect('/games');

    }
}
