@extends('backoffice.admin')


    @section('type')

        <div class="userlist text-ow-white mt-1">
            <ul class="list-group text-center align-items-middle">
                @foreach ($heroes as $hero)
                
                    <li class="list-inline-item align-middle">
                        <div class="cardbo text-white mb-3">
                            <div class="card-body">

                                <form action="/backoffice/heroes" method="POST" class="inline-group">
                                    @csrf
                                    <p class="card-text">
                                        {{ $hero->name }}
                                    </p>
                                    <img class="w-10" src="{{ asset($hero->picture) }}" alt="{{ $hero->name }}"><br>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="delete" value="{{ $hero->id }}" class="btn btn-outline-danger mt-1">DELETE HERO</button>
                                </form>
                            </div>
                        </div>      
                    </li>

                @endforeach
            </ul>
        </div>
        
    @endsection