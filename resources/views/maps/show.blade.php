@extends('layout')
    @section('content')
        <div class="d-flex">
            <h1 class="text-white mx-auto justify-content-center">{{ $map->name }} , {{ $map->picture }}</h1>
        </div> 
    @endsection