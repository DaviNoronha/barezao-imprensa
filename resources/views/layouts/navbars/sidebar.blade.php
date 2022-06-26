<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="height: 80px">
            <div class="row justify-content-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('storage') }}/img/barezao_logo.png" style="width: 150px" alt="...">
                </a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                @if (Auth::user()->perfil->nome == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="ni ni-circle-08 text-primary"></i> {{ __('Usuários') }}
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('time.index') }}">
                        <i class="fas fa-futbol text-primary" ></i> {{ __('Times') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
