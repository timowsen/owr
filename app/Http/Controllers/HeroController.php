<?php

namespace App\Http\Controllers;

use App\hero;

class HeroController extends Controller
{
    public function index() {
        
        $heroes = hero::all();

        return view('heroes.index', compact('heroes'));

    }

    public function show(hero $hero) {

        return $hero;

        return view('heroes.hero', compact('hero'));

    }

    public function create() {

        return view('heroes.create');

    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'type' => 'required'
        ]);


        //temp fileupload not finished
        $path = request()->file('picture')->store('/public/images');

        return $path;
        
        hero::create([
            'name' => request('name'),
            'type' => request('type'),
            'picture' => request('picture')
        ]);

 
        return redirect('/heroes/create');

    }

    
}
