<?php

namespace App\Http\Controllers;

use App\Map;

use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'type' => 'required|between:1,4',
            'picture' => 'required|file'
        ]);
        $fileextension = request()->file('picture')->getClientOriginalExtension();
        $storagename = 'Icon'. '-' . request('name') . "." . $fileextension;
        Storage::putFileAs('/public/images/Map-Icons',  request()->file('picture'), $storagename);
        Map::create([
            'name' => request('name'),
            'type' => request('type'),
            'picture' => "storage/images/Map-Icons/" . $storagename
        ]);
        session()->flash('message', 'Map sucessfully created!');
        return redirect('/backoffice/maps');
    }
}
