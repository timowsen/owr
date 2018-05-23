@extends('layout');


    @section('content')
        @foreach ($maps as $map)
        <div class="d-flex">
            <ul class="list-inline mx-auto justify-content-center">
                <li>
                    <a class="text-white" href="/maps/{{ $map->id }}"> 
                        {{ $map->name }}
                    </a>
                </li>
            </ul>
        </div>
        @endforeach
     @endsection
