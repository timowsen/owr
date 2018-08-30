@extends('layout')

    @section('content')
    <div class="container">
        <nav class="navbar-expand-lg">
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
            </ul>
        </nav>

        @yield('type')

    </div>
    @endsection