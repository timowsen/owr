<?php

namespace App\Http\Controllers;

use Auth;

use App\Bnetaccount;

class BattlenetController extends Controller
{
    public function store()
    {
        $id = Auth::id();
        $this->validate(request(), [
            'bnetaccount' => 'unique:bnetaccounts,bnetaccount,user_id' . $id
        ]);
        $sanitizedbnetaccount = str_replace('#', '-', request('bnetaccount'));
        $bla = Bnetaccount::getbnetapiData($sanitizedbnetaccount, 1);
        if ($bla) {
            session()->flash('message', 'Battletag sucessfully added!');
        } else {
            session()->flash('message', 'Battletag not added - Wrong format or API DOWN!');
        }
        return redirect('/games');
    }

    public function refresh()
    {
        $bla = Bnetaccount::getbnetapiData();
        if ($bla) {
            session()->flash('message', 'Statistics successfully updatet!');
        } else {
            session()->flash('message', 'Statistics could not be updatet!');
        }
        return redirect('/games');
    }

    public function debug()
    {
        $debug = Bnetaccount::debugbnetapiData();
        if ($debug != false) {
            return dump($debug);
        } else {
            session()->flash('message', 'Can´t show blob, Battletag not found!');
            return redirect('/games');
        }
    }
}
