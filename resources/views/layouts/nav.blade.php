<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ Route('home') }}">Anas Academy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  {{ Route::is('home') ? 'active' : '' }} " aria-current="page"
                        href="{{ Route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('test') ? 'active' : '' }}" href="{{ Route('test') }}">Test route
                        with parameter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('log_request') ? 'active' : '' }}"
                        href="{{ Route('log_request') }}">Log request</a>
                </li>
                
            </ul>
            <div class="d-flex" >
                @if (Auth::guest())
                <a href="{{Route('register')}}" class="btn btn-sm btn-success mx-3">Register</a>
                <a href="{{Route('login')}}" class="btn btn-sm btn-outline-success ">Login</a>
                @else
                <a class="btn btn-outline-primary btn-sm mx-3" href="{{route('profile')}}">{{auth()->user()->name}} </a>
                <a class="btn btn-danger btn-sm" href="logout">Logout</a>

                @endif
            </div>
        </div>
    </div>
</nav>


