
<div class="navbar-left">
    <img src="{{asset('images/CinemaXXI.png')}}">
    <ul>
            <a href="{{route('home')}}"><li>Now Playing</li></a>
            <a href="{{route('theatres')}}"><li>Theatres</li></a>
    </ul>
</div>

@yield('search-bar')

<div class="navbar-right">
        <ul>
                @if (Auth::check() && Auth::user()->user_role=='member')
                    <a href="{{route('tickets',['member_id'=> Auth::user()->users_id])}}"><li>Tickets</li></a>
                    <a href="{{route('logout')}}"><li>Logout</li></a>
                @elseif (Auth::check() && Auth::user()->user_role=='admin')
                    <a href="{{route('logout')}}"><li>Logout</li></a>
                @else
                    <a href="{{route('login_page')}}"><li>Login</li></a>
                @endif
        </ul>
    </div>
