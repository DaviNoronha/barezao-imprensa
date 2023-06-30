
<nav class="navbar navbar-top navbar-expand-lg w-100"  id="navbar-main">
  <div class="container">
    @if(Auth::user()->perfil->nome == 'admin')
      <a class="nav-link btn btn-lg btn-white" href="{{ route('edicao.times') }}">
          <span class="mb-0 text-sm font-weight-bold text-primary">Edição {{ \Carbon\Carbon::now()->subYear()->year }}</span>
      </a>
    @endif
    <div class="dropdown">
      <a class="nav-link btn btn-lg btn-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mb-0 text-sm font-weight-bold text-primary"><i class="ni ni-circle-08"></i> {{ Auth::user()->nome }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
        <li>
          <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
              <i class="ni ni-button-power"></i>
              <span>{{ __('Sair') }}</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>