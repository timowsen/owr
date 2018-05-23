<?php

namespace App;

use Auth;

use Storage;

class Bnetaccount extends Model
{
    public function User() {
        return $this->belongsTo(User::class);
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
            $data = @file_get_contents($url, false, $context);

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
    
                if(!empty($avatar)) {
                    $picture = @file_get_contents($avatar);
                    if(!empty($picture)) {
                        $filename = @array_pop(explode('/', $avatar));
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
}
