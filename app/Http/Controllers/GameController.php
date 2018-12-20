<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Game;

use App\Hero;

use App\Map;

use App\User;

use App\Bnetaccount;

class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showgames()
    {
        $games = Game::where('user_id', '=', Auth::id())->with('heroes')->get();
        $bnetaccount = Bnetaccount::where('user_id', '=', Auth::id())->get();
        $heroes = Hero::orderBy('type')->get();
        $maps = Map::orderBy('type')->get();
        $users = User::where('id', '=', Auth::id())->get();
        $apiblob = $bnetaccount->pluck('statscache');
        if (!empty($apiblob)) {
            foreach ($apiblob as $blob) {
                $array = json_decode($blob, true);
            }
        } else {
            $array = "";
        }
        if (!empty($array)) {
            $modal = Bnetaccount::playtimeModal($array);
        } else {
            $modal = "";
        }
        if (!empty($modal) && is_array($modal)) {
            $comptime = collect($modal['ptime']);
            $qptime = collect($modal['qptime']);
        } else {
            $comptime = "";
            $qptime = "";
        }
        //Difference in Rating to last game
        if (!empty($games)) {
            $difference = array();
            $lastrating = 0;
            foreach ($games as $game) {
                $differ = $game['rating'] - $lastrating;
                array_push($difference, $differ);
                $lastrating = $game['rating'];
            }
        }
        return view('games.gameslayout', compact('games', 'heroes', 'maps', 'difference', 'bnetaccount', 'users', 'comptime', 'qptime'));
    }



    public function store()
    {
        $this->validate(request(), [
            'rating' => 'required|numeric|between:1000,5500',
            'win' => 'required',
            'mapchoice' => 'required',
            'herochoice' => 'required|between:1,3'
        ]);
        $gameInfo = [
            'rating' => request('rating'),
            'win' => request('win'),
            'bobos' => (!empty(request('bobos')) ? (request('bobos')) : 0),
            'map_id' => request('mapchoice'),
            'user_id' => auth()->id()
        ];
        // check not yet exists
        $game = @Game::where([
            ['rating', '=', $gameInfo['rating']],
            ['win', '=', $gameInfo['win']],
            ['bobos', '=', $gameInfo['bobos']],
            ['map_id', '=', $gameInfo['map_id']],
            ['user_id', '=', $gameInfo['user_id']],
        ])->get()[0];
        if (empty($game)) {
            $game = Game::Create($gameInfo);
            $game->heroes()->attach(request('herochoice'));
            session()->flash('message', 'Game successfully added!');
            return redirect('/games');
        } else {
            session()->flash('message', 'Game not added, duplicate not possible!');
            return redirect('/games');
        }
    }

    public function delete()
    {
        Game::where('id', request('delete'))->delete();
        session()->flash('message', 'Game deleted successfully');
        return redirect('/games');
    }


}
