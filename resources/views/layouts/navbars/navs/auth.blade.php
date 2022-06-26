<nav class="navbar navbar-top navbar-expand-md navbar-dark mb-5" id="navbar-main">
    <div class="container-fluid mb-5">
        <div class="row d-flex justify-content-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('storage') }}/img/barezao_logo.png" style="width: 130px" alt="...">
            </a>
        </div>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-lg btn-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mb-0 text-sm font-weight-bold text-primary"><i class="ni ni-circle-08"></i> {{ Auth::user()->nome }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="ni ni-button-power"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </div>
                </li>
            </li>
        </ul>
    </div>

    </div>
</nav>
