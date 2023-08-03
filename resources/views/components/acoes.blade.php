@if (Auth::user()->perfil->nome == 'admin')
    @if ($tipo == 'time')
    <div class="row">
        <a href="{{ route('time.jogadores', $data) }}" class="btn btn-sm btn-default"><i class="ni ni-user-run"></i>Jogadores</a>
        <a href="{{ route('time.edit', $data) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
        <form action="{{ route('time.destroy', $data)}}" method="post" >
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
        </form>
    </div>
    @elseif ($tipo == 'user')
    <div class="row">
        <a href="{{ route('user.edit', $data) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
        <form action="{{ route('user.destroy', $data)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
        </form>
    </div>
    @elseif($tipo == 'jogador')
        <div class="row">
            <div class="dropdown">
              <a class="nav-link btn btn-lg btn-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ações
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('jogador.show', $data) }}" class="dropdown-item">
                        <li class="text-default">
                            <i class="fas fa-eye"></i> Visualizar
                        </li>
                    </a>
                    <a href="{{ route('jogador.edit', $data) }}" class="dropdown-item">
                        <li  class="text-success">
                            <i class="fas fa-pen"></i> Editar
                        </li>
                    </a>
                    <form action="{{ route('jogador.destroy', $data)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit">
                            <a href="#">
                                <li class="text-danger">
                                    <i class="fas fa-trash"></i> Excluir
                                </li>
                            </a>
                        </button>
                    </form>
                    <hr class="my-1">
                    <li class="text-center">
                        <span class="text-default text-center">Alterar Status</span>
                    </li>
                    <a href="{{ route('jogador.update-status', $data) }}" class="dropdown-item">
                        @if($data->status)
                            <li class="text-danger">
                                <i class="fas fa-check"></i> Ocultar
                            </li>
                        @else
                            <li class="text-success">
                                <i class="fas fa-check"></i> Ativar
                            </li>
                        @endif
                    </a>
                </ul>
            </div>
        </div>
    @endif
@else
    @if ($tipo == 'time')
        <a href="{{ route('time.jogadores', $data) }}" class="btn btn-sm btn-default"><i class="ni ni-user-run"></i>Jogadores</a>
    @endif
    @if ($tipo == 'jogador')
        <a href="{{ route('jogador.show', $data->id) }}" class="btn btn-sm btn-default"><i class="fas fa-eye"></i></a>
    @endif
@endif
