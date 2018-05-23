<?php

namespace App;

use Auth;

class Bnetaccount extends Model
{
    public function User() {
        return $this->belongsTo(User::class);
    }

    public static function getbnetAcc($accname = "") {
        
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
                return $data;
            } else {
                return false;
            }
        } return false;

    }
}
