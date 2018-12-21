@extends('backoffice.admin')
@section('type')
    <div class="userlist text-ow-white mt-1">
        <ul class="list-group text-center align-items-middle">
            @foreach ($seasons as $season)
                <li class="list-inline-item align-middle">
                    <div class="cardbo text-white mb-3">
                        <div class="card-body">
                            <form action="/backoffice/seasons" method="POST" class="inline-group">
                                @csrf
                                <p class="card-text">
                                    SEASON: {{ $season->seasonindex }}
                                </p>
                                <img class="w-10" src="{{ asset($season->picture) }}" alt="{{ $season->seasonindex }}">
                                <br>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" name="delete" value="{{ $season->id }}"
                                        class="btn btn-outline-danger mt-1">DELETE SEASON
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection