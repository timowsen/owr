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

        $apiblob = Bnetaccount::select('statscache')->where('user_id', '=', Auth::id())->first();

        $array = json_decode($apiblob['statscache'], true);

        $heroes = hero::all();

        $maps = Map::all();

        $users = User::where('id', '=', Auth::id())->get();

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

        if (!empty($array)) {
            
            $heroplayed = array();
            foreach ($array['eu']['heroes']['playtime']['competitive'] as $name => $value) {
                $heroplayed[$name] = $value;
            }
            arsort($heroplayed);

            foreach ($array['eu']['heroes']['stats']['competitive'] as $name => $value) {
                $herostatscomp[$name] = $value;
            }
            arsort($herostatscomp);


            $heroplaytime = "";
            $fullplaytime = 0;

            foreach ($heroplayed as $heroname => $value) {
                $fullplaytime = $fullplaytime + $value;
            }

            foreach ($heroplayed as $heroname => $value) {
                $barlength = $value * 100 / $fullplaytime;
                if ($value < 1) {
                    $value = 60 * number_format($value, 1) . " Minutes played";
                } else {
                    $value = number_format($value, 0) . " Hours played";
                }
                if	(!empty($herostatscomp[$heroname]['general_stats']['games_won']) && $herostatscomp[$heroname]['general_stats']['games_won'] > 0) {
                    $value .= ' | Win: '.$herostatscomp[$heroname]['general_stats']['games_won'].' ';
                }
                if	(!empty($herostatscomp[$heroname]['general_stats']['games_tied']) && $herostatscomp[$heroname]['general_stats']['games_tied'] > 0) {
                    $value .= ' | Draw: '.$herostatscomp[$heroname]['general_stats']['games_tied'].' ';
                }
                if	(!empty($herostatscomp[$heroname]['general_stats']['games_lost'])) {
                    $value .= ' | Loss: '.$herostatscomp[$heroname]['general_stats']['games_lost'].' ';
                }

                if(!empty($herostatscomp[$heroname]['general_stats']['games_won'])) {
                    $winratepartial = $herostatscomp[$heroname]['general_stats']['games_won'];
                } else {
                    $winratepartial = 0;
                }

                if(!empty($herostatscomp[$heroname]['general_stats']['games_lost'])) {
                    $lossratepartial = $herostatscomp[$heroname]['general_stats']['games_lost'];
                } else {
                    $lossratepartial = 0;
                }

                $winratefull = $winratepartial + $lossratepartial; 
                
                $winrate = (!empty($herostatscomp[$heroname]['general_stats']['games_won']) ? ($herostatscomp[$heroname]['general_stats']['games_won'] * 100 / $winratefull) : 0);
            
                if ($winrate > 0) {
                    $value .= ' | Winrate: '. number_format($winrate, 2) .'' . '%';
                }

                $heroplaytime .= '<li class="list-group-item">
                        <img src="/images/Hero-Icons/Icon-' . $heroname . '.png" alt=' . $heroname . ' class="img-thumbnailtable3">
                        <p style="font-size:12px;">&nbsp;&nbsp;&nbsp;' . $value . '</p>
                        <span class="list-group-progress" style="width: ' . $barlength . '%;"></span>
                    </li>';
            }

            $heroplayedqp = array();
            foreach ($array['eu']['heroes']['playtime']['quickplay'] as $name => $value) {
                $heroplayedqp[$name] = $value;
            }
            arsort($heroplayedqp);

            $heroqpplaytime = "";
            $fullplaytimeqp = 0;

            foreach ($heroplayedqp as $heroname => $value) {
                $fullplaytimeqp = $fullplaytimeqp + $value;
            }


            foreach ($heroplayedqp as $heroname => $value) {
                $barlength = $value * 100 / $fullplaytimeqp;
                if ($value < 1) {
                    $value = 60 * number_format($value, 2) . " Minutes played";
                } else {
                    $value = number_format($value,0) . " Hours played";
                }

                $heroqpplaytime .= '<li class="list-group-item">
                        <img src="/images/Hero-Icons/Icon-' . $heroname . '.png" alt=' . $heroname . ' class="img-thumbnailtable3">
                        &nbsp;&nbsp;&nbsp;' . $value . '
                        <span class="list-group-progress" style="width: ' . $barlength . '%;"></span>
                    </li>';
            }

        }

        return view('games.gameslayout', compact('games', 'heroes', 'maps', 'difference', 'bnetaccount', 'users', 'heroqpplaytime', 'heroplaytime'));

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
