<?php

namespace App\Http\Controllers;

use Auth;

use App\Bnetaccount;

use Illuminate\Support\Facades\Storage;

class BattlenetController extends Controller
{
    public function store() 
    {   
        $id = Auth::id();
        
        $this->validate(request(), [
            'bnetaccount' => 'unique:bnetaccounts,bnetaccount,user_id'.$id
        ]);

        $sanitizedbnetaccount = str_replace('#', '-', request('bnetaccount'));

        $bla = Bnetaccount::getbnetapiData($sanitizedbnetaccount, 1);

        if($bla) {
            session()->flash('message', 'Bnetaccount sucessfully added!');
        } else {
            session()->flash('message', 'Bnetaccount not added - Wrong format or API DOWN!');
        }
        
        return redirect('/games');

    }

    public function refresh() 
    {   

        $bla = Bnetaccount::getbnetapiData();

        if($bla) 
        {
            session()->flash('message', 'Statistics successfully updatet!');
        } else {
            session()->flash('message', 'Statistics could not be updatet!');
        }
        
        return redirect('/games');

    }

    public function debug() {

        $debug = Bnetaccount::debugbnetapiData();

        return $debug;
    }
    
}
