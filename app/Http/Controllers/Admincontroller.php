<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Bnetaccount;

use App\User;

use App\Hero;

use App\Map;

use App\Game;

class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edituserrole()
    {

        $this->validate(request(), [
            'role' => 'required|between:0,1'
        ]);
         
        $id = request('changerole');

        $role = request('role');

        User::find($id)->update(['admin' => $role]);

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyhero()
    {   
        $hero_id = request('delete');

        $heroes = Game::whereHas('heroes', function ($q) use ($hero_id) {
            $q->where('id', $hero_id);
        })->count();

        if($heroes > 0) {

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
        if(Game::where('map_id', request('delete'))->count() > 0) {

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
