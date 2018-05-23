@extends('layout')

    @section('content')
        <div class="d-flex">
            <h1 class="text-white mx-auto justify-content-center">{{ $hero->name }} , {{ $hero->picture }}</h1>
        </div>
    @endsection