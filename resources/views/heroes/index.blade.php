@extends('layout')


    @section('content')
        @foreach ($heroes as $hero)
            <div class="d-flex">
                <ul class="list-inline mx-auto justify-content-center">
                    <li>
                        <a class="text-white" href="/heroes/{{ $hero->id }}"> 
                            {{ $hero->name }}
                        </a>
                    </li>
                </ul>
            </div>
        @endforeach
     @endsection
