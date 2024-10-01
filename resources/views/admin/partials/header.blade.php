<header>
    <div class="container-fluid text-bg-dark d-flex justify-content-between px-3">
        <div>
            <a href="{{route('home')}}" target="_blank"> Vai sul sito
        </div>
        <div>
            <ul class="navbar">
                @guest
                    <li class="nav-item pe-3">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.home')}}">Admin</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>        
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
    
</header>