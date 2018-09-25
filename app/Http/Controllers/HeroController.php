<?php

namespace App\Http\Controllers;

use App\hero;

class HeroController extends Controller
{
    public function index() 
    {
        $heroes = Hero::all();
        return view('heroes.index', compact('heroes'));
    }

    public function show(Hero $hero) 
    {
        return $hero;
        return view('heroes.hero', compact('hero'));
    }

    public function create() 
    {
        return view('heroes.create');
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required',
            'type' => 'required'
        ]);
        $path = request()->file('picture')->store('/public/images/Hero-Icons');
        $filename = @array_pop(explode('/', $path));
        Hero::create([
            'name' => request('name'),
            'type' => request('type'),
            'picture' => "storage/images/Hero-Icons/".$filename
        ]);
        return redirect('/heroes/create');
    }
}
