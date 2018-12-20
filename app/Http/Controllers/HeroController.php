<?php

namespace App\Http\Controllers;

use App\hero;

use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'type' => 'required|between:1,3',
            'picture' => 'required|file'
        ]);
        $fileExtension = request()->file('picture')->getClientOriginalExtension();
        $storagename = 'Icon'. '-' . request('name') . "." . $fileExtension;
        //save file as hash with helper functions 
        //$path = request()->file('picture')->store('/public/images/Hero-Icons');
        //save file as filename with facade
        //path, input, filename
        Storage::putFileAs('/public/images/Hero-Icons',  request()->file('picture'), $storagename);
        Hero::create([
            'name' => request('name'),
            'type' => request('type'),
            'picture' => "storage/images/Hero-Icons/" . $storagename
        ]);
        session()->flash('message', 'Hero successfully created!');
        return redirect('/backoffice/heroes');
    }
}
