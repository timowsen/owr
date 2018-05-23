<?php

namespace App\Http\Controllers;

use App\Map;

class MapController extends Controller
{

    public function index() {

        $maps = Map::all();

        return view('maps.index', compact('maps'));

    }


    public function show(Map $map) {

        return view('maps.show', compact('map'));

    }


    public function create() {
        
        return view('maps.create');

    }

    public function store() {

        $this->validate(request() , [
            'type' => 'required',
            'name' => 'required',
            'picture' => 'required'
        ]);


        Map::create([
            'type' => request('type'),
            'name' => request('name'),
            'picture' => request('picture')
        ]);

        return redirect('/maps/create');
    }
}
