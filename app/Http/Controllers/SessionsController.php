<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SessionsController extends Controller
{


    public function create() {

        if(!auth()->attempt(request(['email', 'password']))) {

            $userresetpw = User::where('email', request('email'))->where('resetpw', 1)->value('id');

            if(!empty($userresetpw)) {

                session(['resetemail' => $userresetpw]);

                return view('auth.resetpw');

            } else {

                return back()->withErrors([
                    'message' => 'Username and/or password doesn´t match'
                ]);

            }

        } else {

            session()->flash('message', 'Successfully logged in!');

            return redirect('/games');
        }

    }

    public function destroy() {

        auth()->logout();

        session()->flash('message', 'Successfully logged out!');
        
        return redirect('/');

    }
}
