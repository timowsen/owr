<?php

namespace App\Http\Controllers;

use Auth;

use App\Game;

use App\hero;

use App\Map;

use App\User;

use App\Bnetaccount;

class GameController extends Controller
{

    public function __construct() {

        $this->middleware('auth');

    }


    public function showgames() {

        $games = Game::where('user_id', '=', Auth::id())->with('heroes')->get();

        $bnetaccount = Bnetaccount::where('user_id', '=', Auth::id())->get();

        $heroes = hero::all();

        $maps = Map::all();

        $users = User::where('id', '=', Auth::id())->get();

        $apiblob = $bnetaccount->pluck('statscache');

        if(!empty($apiblob)) {
            foreach($apiblob as $blob) {
                $array = json_decode($blob, true);
            }
        } else {
            $array = "";
        }
        
        $modal = Bnetaccount::playtimeModal($array);

        //Difference in Rating to last game
        if(!empty($games)) {
            $difference = array();
            $lastrating = 0;
            foreach($games as $game) {
                $differ = $game['rating'] - $lastrating;

                array_push($difference, $differ);

                $lastrating = $game['rating'];
            }
        }

        return view('games.gameslayout', compact('games', 'heroes', 'maps', 'difference', 'bnetaccount', 'users', 'modal'));

    }


    
    public function store() {


        $this->validate(request(), [
            'rating' => 'required',
            'win' => 'required',
            'mapchoice' => 'required',
            'herochoice' => 'required|between:1,3'
        ]);
                
        $game = Game::create([
            'rating' => request('rating'),
            'win' => request('win'),
            'bobos' => (!empty(request('bobos')) ? (request('bobos')) : 0),
            'map_id' => request('mapchoice'),
            'user_id' => auth()->id()
        ]);
            
        $game->heroes()->attach(request('herochoice'));

        if($game) {
            session()->flash('message', 'Game successfully added!');

            return redirect('/games');
        } 

    }

    public function delete() {

        Game::where('id',request('delete'))->delete();

        session()->flash('message', 'Game deleted successfully');

        return redirect('/games');
    }


}
