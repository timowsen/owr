<nav class="navbar-expand-lg">
        <ul class="navbar-nav paddingremove">
            <li class="nav-item ml-1">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-xs btn-danger" name="logout" value="1">LOGOUT</button>
            </form>
            </li>
            <li class="nav-item ml-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
        </ul>
    </nav>