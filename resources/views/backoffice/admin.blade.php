@extends('layout')
@section('content')
    <div class="container">
        <nav class="navbar-expand-lg mb-1">
            <ul class="navbar-nav paddingremove">
                <li class="nav-item ml-1">
                    <a href="/games">
                        <button type="submit" class="btn btn-xs btn-danger" name="logout" value="1">
                            BACK
                        </button>
                    </a>
                </li>
                <li class="nav-item ml-1">
                    <a href="/backoffice">
                        <button type="button" class="btn btn-primary">
                            USERS
                        </button>
                    </a>
                </li>
                <li class="nav-item ml-1">
                    <a href="/backoffice/maps">
                        <button type="button" class="btn btn-playtimecomp">
                            MAPS
                        </button>
                    </a>
                </li>
                <li class="nav-item ml-1">
                    <a href="/backoffice/heroes">
                        <button type="button" class="btn btn-playtimeqp">
                            HEROES
                        </button>
                    </a>
                </li>
                <li class="nav-item ml-1">
                    <a href="/backoffice/seasons">
                        <button type="button" class="btn btn-warning">
                            SEASONS
                        </button>
                    </a>
                </li>
                @if(!empty($bnetaccount))
                    <li class="nav-item ml-1">
                        <a href="/debug">
                            <button type="submit" name="refreshstats" class="btn btn-info">
                                DEBUG
                            </button>
                        </a>
                    </li>
                @endif
                @if(request()->path() == 'backoffice/heroes')
                    <li class="nav-item ml-1">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addHeroModal">
                            ADD HERO
                        </button>
                    </li>
                @endif
                @if(request()->path() == 'backoffice/maps')
                    <li class="nav-item ml-1">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addMapModal">
                            ADD MAP
                        </button>
                    </li>
                @endif
            </ul>
        </nav>
        @if(request()->path() == 'backoffice/heroes')
            @include('heroes.createmodal')
        @endif
        @if(request()->path() == 'backoffice/maps')
            @include('maps.createmodal')
        @endif
        @if(request()->path() == 'backoffice/seasons')

        @endif
        @include('games.flashmessage')
        @include('../errors')
        @yield('type')
    </div>
    @if ($flash = session('message') or !empty($errors))
        <script>
            window.setTimeout(function () {
                $(".alert").hide();
            }, 2500);
        </script>
    @endif
@endsection