<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{


    public function create() {

        if(!auth()->attempt(request(['email', 'password']))) {
            
            return back()->withErrors([
                'message' => 'Username and/or password doesn´t match'
            ]);

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
