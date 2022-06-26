<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                @if(Auth::user()->perfil->nome == 'admin')
                <div class="col-xl-4 col-lg-6">
                    <a href="{{route('user.index')}}">
                        <div class="card btn btn-secondary card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title text-uppercase mb-0">Usuários</h3>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-lg">
                                    <i class="ni ni-circle-08 text-primary" style="width: 100px"></i>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                <div class="{{Auth::user()->perfil->nome == 'admin' ? 'col-xl-4' : 'col-xl-6'}} col-lg-6">
                    <a href="{{route('time.index')}}">
                        <div class="card btn btn-secondary card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title text-uppercase mb-0">Times</h3>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-lg">
                                    <i class="fas fa-futbol text-primary"></i>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="{{Auth::user()->perfil->nome == 'admin' ? 'col-xl-4' : 'col-xl-6'}} col-lg-6">
                    <a href="{{route('jogador.index')}}">
                        <div class="card btn btn-secondary card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title text-uppercase mb-0">Jogadores</h3>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-lg">
                                    <i class="ni ni-user-run text-primary"></i>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
