<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = User::where('admin', '=', 1)->get()->first();
            if (empty($this->user)) {
                $request->attributes->add(['forceRegisterAdmin' => 'true']);
            }
            return $next($request);
        });
    }

    public function showloginform(Request $request)
    {
        $forceregister = $request->get('forceRegisterAdmin');
        if ($forceregister == true) {
            return view('auth.registeradmin');
        } elseif (auth()->check()) {
            return redirect('/games');
        } else {
            return view('auth.login');
        }
    }

    public function showregisterform()
    {
        return view('auth.register');
    }

    public function storeadmin()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'admin' => 1,
            'password' => bcrypt(request('password'))
        ]);
        auth()->login($user);
        session()->flash('message', 'Successfully logged in!');
        return redirect('/games');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'admin' => 0,
            'password' => bcrypt(request('password'))
        ]);
        auth()->login($user);
        session()->flash('message', 'Successfully logged in!');
        return redirect('/games');
    }

    public function resetpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return view('auth.resetpw')->withErrors($validator);
        }
        $id = $request->session()->pull('resetemail', 'default');
        if (!empty($id)) {
            User::where('id', $id)->update(['resetpw' => 0]);
            User::where('id', $id)->update(['password' => bcrypt(request('password'))]);
            $request->session()->flush();
            session()->flash('message', 'Successfully changed Password!');
            return redirect('/');
        }
    }
}
