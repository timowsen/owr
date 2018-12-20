<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImprintController extends Controller
{
    public function showimprint()
    {
        return view('imprint');
    }

    public function showdataprotection()
    {
        return view('dataprotection');
    }
}
