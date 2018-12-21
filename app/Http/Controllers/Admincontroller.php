<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Bnetaccount;

use App\User;

use App\Hero;

use App\Map;

use App\Game;

use App\Season;

class Admincontroller extends Controller
{
    public function show()
    {
        $users = User::all();
        $bnetaccount = Bnetaccount::where('user_id', '=', Auth::id())->get();
        return view('backoffice.users', compact('users', 'bnetaccount'));
    }

    public function showheroes()
    {
        $heroes = hero::orderBy('type')->get();
        return view('backoffice.heroes', compact('heroes'));
    }

    public function showmaps()
    {
        $maps = Map::all();
        return view('backoffice.maps', compact('maps'));
    }

    public function showseasons()
    {
        $seasons = Season::all();
        return view('backoffice.seasons', compact('seasons'));
    }

    public function edituserrole($id)
    {
        $this->validate(request(), [
            'role' => 'required|between:0,1'
        ]);
        $userid = $id;
        $role = request('role');
        User::find($userid)->update(['admin' => $role]);
        session()->flash('message', 'Role of User changed successfully');
        return redirect('/backoffice');
    }

    public function resetuserpassword()
    {
        $this->validate(request(), [
            'resetpw' => 'required'
        ]);
        $id = request('resetpw');
        User::where('id', $id)->update(['resetpw' => 1]);
        session()->flash('message', 'Password for user successfully reset!');
        return redirect('/backoffice');
    }

    public function destroyhero()
    {
        $hero_id = request('delete');
        $heroes = Game::whereHas('heroes', function ($q) use ($hero_id) {
            $q->where('id', $hero_id);
        })->count();
        if ($heroes > 0) {
            session()->flash('message', 'Hero can´t be deleted, it is still in use!');
            return redirect('/backoffice/heroes');
        } else {
            Hero::where('id', request('delete'))->delete();
            session()->flash('message', 'Hero deleted successfully');
            return redirect('/backoffice/heroes');
        }

    }

    public function destroymap()
    {
        if (Game::where('map_id', request('delete'))->count() > 0) {
            session()->flash('message', 'Map can´t be deleted, it is still in use!');
            return redirect('/backoffice/maps');
        } else {
            Map::where('id', request('delete'))->delete();
            session()->flash('message', 'Map deleted successfully');
            return redirect('/backoffice/maps');
        }

    }

    public function destroyuser()
    {
        User::where('id', request('delete'))->delete();
        session()->flash('message', 'User deleted successfully');
        return redirect('/backoffice');
    }


}
