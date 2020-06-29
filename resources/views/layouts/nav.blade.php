<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top fixed-top">
    <a class="navbar-brand" href="{{ route('todo.index') }}">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/"><i class="fas fa-home"></i> Főoldal<span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ (request()->is('todo')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('todo.index') }}"><i class="fas fa-clipboard-list"></i> ToDo
                    Lista<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ (request()->is('todo/create')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('todo.create') }}"><i class="fas fa-plus"></i> Új ToDo
                    Létrehozása<span
                        class="sr-only">(current)</span></a>
            </li>
        </ul>
        <button class="btn btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}
            @if (Auth::user()->avatar)
                <img src="{{ asset('/storage/'.Auth::user()->avatar) }}" alt="Avatar"
                     width="30px" class="pb-1">
            @endif
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            @if(Auth::user()->role_id == 1)
                <a class="dropdown-item" href="{{ '/admin' }}" target="_blank">Admin Panel</a>
                <div class="dropdown-divider"></div>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Kijelentkezés</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>
