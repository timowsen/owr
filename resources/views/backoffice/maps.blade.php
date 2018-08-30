@extends('backoffice.admin')


    @section('type')

        <div class="userlist text-ow-white mt-1">
            <ul class="list-group text-center align-items-middle">
                @foreach ($maps as $map)
                
                    <li class="list-inline-item align-middle">
                        <div class="cardbo text-white mb-3">
                            <div class="card-body">

                                <form action="/backoffice/maps" method="POST" class="inline-group">
                                    @csrf
                                    <p class="card-text">
                                        {{ $map->name }}
                                    </p>
                                    <img class="w-15" src="{{ asset($map->picture) }}" alt="{{ $map->name }}"><br>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="delete" value="{{ $map->id }}" class="btn btn-outline-danger mt-1">DELETE MAP</button>
                                </form>
                            </div>
                        </div>      
                    </li>

                @endforeach
            </ul>
        </div>
        
    @endsection