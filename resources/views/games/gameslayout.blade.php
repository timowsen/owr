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
                                    <p class="h2 text-ow-white">WINRATE: {{$account->winrate}} %  RATING: {{$account->rating}}<img src="{{asset("storage/images/Rank-Icons/" . $account->tier)}}" alt="{{$account->tier}}"  style="
                                            height: 50px; width: auto;">
                                        <?xml version="1.0" encoding="utf-8"?>
                                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                        <svg version="1.1" id="Page-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 200.2 188.4" enable-background="new 0 0 200.2 188.4" class="endorsement text-ow-white" xml:space="preserve">
                                        <g opacity="0.7" enable-background="new    ">
                                            <image overflow="visible" opacity="0.75" width="211" height="199" xlink:href="http://127.0.0.1:8000/storage/images/svg/ED575D7C.png"  transform="matrix(1 0 0 1 -5 -5)">
                                            </image>
                                            <g>
                                                <path fill="#FFFFFF" d="M133.3,10l-5.2,8.4c-8.7-3.3-18.2-5.1-28-5.1c-9.9,0-19.3,1.9-28,5.1L66.9,10C33.6,23.3,10,56,10,94.2
                                                    c0,38.2,23.5,70.9,56.8,84.2L72,170c8.7,3.3,18.2,5.2,28.1,5.2c9.9,0,19.3-1.9,28.1-5.2l5.2,8.4c33.3-13.3,56.8-46,56.8-84.2
                                                    C190.2,56,166.6,23.3,133.3,10z M100.1,163.6c-38.1,0-69-31.1-69-69.4c0-38.3,30.9-69.4,69-69.4s69,31.1,69,69.4
                                                    C169.1,132.5,138.2,163.6,100.1,163.6z"/>
                                            </g>
                                        </g>
                                        <path id="Fill-5_2_" fill="#777776" enable-background="new    " d="M161.3,93.2c0-34.2-27.8-62-62.1-62S37,58.9,37,93.2
                                            s27.8,62,62.1,62S161.3,127.4,161.3,93.2"/>
                                        <g id="Group_4_" transform="translate(31.067164, 25.895161)">
                                            <path id="Fill-7_3_" fill="#3ECF42" d="M15.3,67.4C15.3,39.7,36.7,17,63.9,15V9.7c-30.1,2-53.9,27-53.9,57.7s23.8,55.7,53.9,57.7
                                                v-5.3C36.7,117.7,15.3,95.1,15.3,67.4"/>
                                            <path id="Fill-9_3_" fill="#F1960A" d="M71.5,9.7V15c16.1,1.2,30.2,9.6,39,22.1l4.3-3.1C105.1,20.2,89.4,10.9,71.5,9.7"/>
                                            <path id="Fill-11_2_" fill="#C913F5" d="M114,43.6c3.9,7.3,6.1,15.7,6.1,24.6c0,27.7-21.4,50.4-48.6,52.4v5.3
                                                c30.1-2,53.9-27,53.9-57.7c0-10.1-2.6-19.5-7.1-27.8L114,43.6z"/>
                                        </g>
                                        <text fill="white" transform="matrix(1 0 0 1 71.4474 129.9033)" font-family="inherit" font-size="105px">{{ $account->endorsementlevel }}</text>
                                        </svg>
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
                                            <div class="col-lg-4 col-sm-4"><img src="{{ asset($hero->picture) }}" alt="{{ $hero->name }}" class="img-thumbnailtable2 w-100"></div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                            <img src="{{ asset($game->map->picture) }}" alt="{{ $game->map->name }}" class="img-thumbnailtable w-100">
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
        @if (!empty($comptime) && !empty($qptime))
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