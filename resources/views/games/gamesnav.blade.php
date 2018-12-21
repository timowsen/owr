<nav class="navbar-expand-lg">
    <ul class="navbar-nav paddingremove">
        <li class="nav-item ml-1">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addgameModal">
                ADD GAME
            </button>
        </li>
        @if (!count($bnetaccount))
            <li class="nav-item ml-1">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#bnetModal">
                    ADD Battle.net Account
                </button>
            </li>
        @endif
        @if (!empty($comptime) && !empty($qptime))
            <li class="nav-item ml-1">
                <button type="button" class="btn btn-playtimecomp" data-toggle="modal" data-target="#bnetstatsModal">
                    Competitive Playtime
                </button>
            </li>
            <li class="nav-item ml-1">
                <button type="button" class="btn btn-playtimeqp" data-toggle="modal" data-target="#playtimeqpModal">
                    Quick Play Playtime
                </button>
            </li>
            <li class="nav-item ml-1">
                <form class="form-inline" action="/refresh" method="POST">
                    @csrf
                    <button type="submit" name="refreshstats" class="btn btn-secondary">
                        REFRESH STATS
                    </button>
                </form>
            </li>
        @endif
        @foreach ($users as $user)
            @if ($user->admin == 1)
                <li class="nav-item ml-1">
                    <a href="/backoffice">
                        <button type="submit" name="refreshstats" class="btn btn-info">
                            BACKOFFICE
                        </button>
                    </a>
                </li>
            @endif
        @endforeach
        <li class="nav-item ml-1">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-xs btn-danger" name="logout" value="1">LOGOUT</button>
            </form>
        </li>
        @if(count($seasons))
            <li class="nav-item marginseasondropdown">
                <div class="btn-group show">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" style="background: transparent; border:none;">
                        <img class="border border-primary rounded seasondropdownbutton"
                             src="{{ url('') . "/" . $seasonbutton->picture  }}" alt="{{ $seasonbutton->seasonindex }}">
                    </button>
                    <div class="dropdown-menu seasondropdown" x-placement="bottom-start">
                        @foreach($seasons as $season)
                            <div class="m">
                                <a class="dropdown-item" href="/games/season/{{ $season->id }}">
                                    <img class="border border-primary rounded" style="height: 40px; width: 40px;"
                                         src="{{ url('') . "/" . $season->picture  }}" alt="{{ $season->seasonindex }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>
        @endif
    </ul>
</nav>