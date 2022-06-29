<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid d-flex justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
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
