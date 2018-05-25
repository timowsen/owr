@extends ('layout')

    @section ('content')


        <!-- content -->
        <div class="container">
            <div class="welcome">
                    @if (Auth::check())
                        @if (!empty($users))
                            @foreach ($users as $user)
                                <h1 style="color: white;">
                                    @if (count($bnetaccount))
                                        @foreach($bnetaccount as $account)
                                            <img src="{{ asset($account->avatar) }}" class="avatar img-thumbnail">
                                        @endforeach
                                    @endif
                                    Welcome {{$user->name}}
                                </h1>
                            @endforeach
                        @endif
                        @if (count($bnetaccount))
                            @foreach ($bnetaccount as $account)
                                @if ($account->winrate && $account->rating && $account->tier)
                                <div>
                                    <p class="h2 text-ow-white">WINRATE: {{$account->winrate}} % RATING: {{$account->rating}}<img src="/images/Rank-Icons/{{$account->tier}}" alt="{{$account->tier}}"  style="
                                            height: 50px; width: auto;">
                                    </p>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    @endif
            </div>
                @include('games.gamesnav')
                <br>
                @include('../errors')
                @include('games.flashmessage')
                @if(count($games))
                <div class="table-responsive tablefontsize">
                    <table class="table text-ow-white display-5">
                        <thead class="thead-inverse">
                        <tr>
                            <th class="text-center">Heroes</th>
                            <th class="text-center">Map</th>
                            <th class="text-center">Win</th>
                            <th class="text-center">Bobos</th>
                            <th class="text-center">Rating</th>
                            <th class="text-center">Difference</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $game)
                            <tr>
                                <td>
                                    <div class="row">
                                        @foreach($game->heroes as $hero)
                                            <div class="col-lg-4 col-sm-4"><img src="/images/Hero-Icons/{{$hero->picture}}" alt="{{ $hero->name }}" class="img-thumbnailtable2 w-100"></div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                            <img src="/images/Map-Icons/{{ $game->map->picture }}" alt="{{ $game->map->name }}" class="img-thumbnailtable w-100">
                                            <strong><p>{{ $game->map->name }}</p></strong>
                                        </div>
                                    </div>
                                </td>
                                @if ($game->win === 1)
                                    <td style="color:green;">WIN</td>
                                @elseif ($game->win === 2)
                                    <td style="color:red;">LOSS</td>
                                @elseif ($game->win === 3)
                                    <td style="color:blue;">DRAW</td>
                                @endif
                                <td>
                                    {{ $game->bobos }}
                                </td>
                                <td>
                                    {{ $game->rating }}
                                </td>
                                @if($difference[$loop->index] > 0)
                                    <td style="color:green;">+{{ $difference[$loop->index] }}</td>
                                @elseif($difference[$loop->index] < 0)
                                    <td style="color:red;">{{ $difference[$loop->index] }}</td>
                                @elseif($difference[$loop->index] === 0)
                                    <td style="color:blue;">0</td>
                                @endif
                                <td class="pr-0">
                                    <form action="/games" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" name="delete" value="{{$game->id}}" class="btn btn-outline-danger">DELETE GAME</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                       
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="text-ow-white text-center"><h1>List is empty, please add Games!</h1></div>
                @endif
        </div>
        @include('games.gamesaddmodal')
        @if (!count($bnetaccount))
            @include('api.bnetaddmodal')
        @endif
        @if (!empty($modal['ptime']) && !empty($modal['qptime']))
            @include('api.playtimemodal')
        @endif

    @endsection

    @section('timeout')

        @if ($flash = session('message') or !empty($errors))
            <script>
                window.setTimeout(function() {
                        $(".alert").hide(); 
                }, 2500);
            </script>
        @endif

    @endsection