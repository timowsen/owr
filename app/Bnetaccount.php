<?php

namespace App;

use Auth;

use Storage;

use App\Hero;

class Bnetaccount extends Model
{
    public function User() {
        return $this->belongsTo(User::class);
    }

    public static function debugbnetapiData() {

        if(env('OW_API_URL', false) && env('OW_API_PORT', false)) {
            $apiurl = env('OW_API_URL', false);
            $apiport = env('OW_API_PORT', false);
        } else {
            $apiurl = 0;
            $apiport = 0;
        }

        if(env('OW_API_URL', false) && env('OW_API_PORT', false)) {
            $apiurl = env('OW_API_URL', false);
            $apiport = env('OW_API_PORT', false);
        } else {
            $apiurl = 0;
            $apiport = 0;
        } 
        if(empty($accname)) {
            $battle = Bnetaccount::select('bnetaccount')->where('user_id', '=', Auth::id())->first();
            $battle = $battle['bnetaccount'];
        } else {
            $battle = $accname;
        }
        $options  = array('http' => array('user_agent' => 'timowsen12345'));
        $context = stream_context_create($options);
        if($apiurl !== 0 && $apiport !== 0) {
            $url = "http://$apiurl:$apiport/api/v3/u/$battle/blob";
            $data = file_get_contents($url, false, $context);
            $json = json_decode($data, true);

            return $json;
        } else {
            return false;
        }
            
    }

    public static function getbnetapiData($accname = "", $type = 2) {
        
        if(env('OW_API_URL', false) && env('OW_API_PORT', false)) {
            $apiurl = env('OW_API_URL', false);
            $apiport = env('OW_API_PORT', false);
        } else {
            $apiurl = 0;
            $apiport = 0;
        } 
        if(empty($accname)) {
            $battle = Bnetaccount::select('bnetaccount')->where('user_id', '=', Auth::id())->first();
            $battle = $battle['bnetaccount'];
        } else {
            $battle = $accname;
        }
        $options  = array('http' => array('user_agent' => 'timowsen12345'));
        $context = stream_context_create($options);
        if($apiurl !== 0 && $apiport !== 0) {
            $url = "http://$apiurl:$apiport/api/v3/u/$battle/blob";
            $data = file_get_contents($url, false, $context);

            if(!empty($data)) {
                
                $decode = json_decode($data, true);

                $ranks = array(
                    'bronze' => '120px-Badge_1_Bronze.png',
                    'silver' => '120px-Badge_2_Silver.png',
                    'gold' => '120px-Badge_3_Gold.png',
                    'platinum' => '120px-Badge_4_Platinum.png',
                    'diamond' => '120px-Badge_5_Diamond.png',
                    'master' => '120px-Badge_6_Master.png',
                    'grandmaster' => '120px-Badge_7_Grandmaster.png',
                    'top500' => '120px-Badge_8_Top_500.png'
                );
    
                $rating = $decode['eu']['stats']['competitive']['overall_stats']['comprank'];
                $tier = $ranks[$decode['eu']['stats']['competitive']['overall_stats']['tier']];
                $winrate = $decode['eu']['stats']['competitive']['overall_stats']['win_rate'];
                $avatar = $decode['eu']['stats']['competitive']['overall_stats']['avatar'];
                $endorsementlevel = $decode['eu']['stats']['competitive']['overall_stats']['endorsement_level'];
    
                if(!empty($avatar)) {
                    $picture = file_get_contents($avatar);
                    if(!empty($picture)) {
                        $explodearray = explode('/', $avatar);
                        $filename = array_pop($explodearray);
                        $bla = Storage::put('public/avatar/'. $filename .'', $picture);
                    }
                }
                
                if($type == 1) {
                    $bnetadd = Bnetaccount::create([
                        'bnetaccount' => request('bnetaccount'),
                        'user_id' => auth()->id(),
                        'rating' => $rating,
                        'tier' => $tier,
                        'winrate' => $winrate,
                        'avatar' => "storage\avatar\\".$filename,
                        'endorsementlevel' => $endorsementlevel,
                        'statscache' => $data
                    ]);

                    if($bnetadd && $bla) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    $bnetupdate = Bnetaccount::where('user_id', auth()->id())
                    ->update([
                    'rating' => $rating,
                    'tier' => $tier,
                    'winrate' => $winrate,
                    'avatar' => "storage\avatar\\".$filename,
                    'statscache' => $data]);

                    if($bnetupdate && $bla) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function playtimeModal($array) {

        if(!empty($array) && is_array($array)) {

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

            $heropicture = Hero::where('name', '=', $heroname)->value('picture');

          

            $heroplaytime .= '<li class="list-group-item">
                    <img src="'. asset($heropicture) .'" alt=' . $heroname . ' class="img-thumbnailtable3">
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

            $heropicture = Hero::where('name', '=', $heroname)->value('picture');

            $heroqpplaytime .= '<li class="list-group-item">
                    <img src="'. asset($heropicture) .'" alt=' . $heroname . ' class="img-thumbnailtable3">
                    &nbsp;&nbsp;&nbsp;' . $value . '
                    <span class="list-group-progress" style="width: ' . $barlength . '%;"></span>
                </li>';
        }

        $playtimemodal['ptime'] = $heroplaytime;
        $playtimemodal['qptime'] = $heroqpplaytime;
        
        return $playtimemodal;


    } else {
        return false;
    }
    
    }
}
