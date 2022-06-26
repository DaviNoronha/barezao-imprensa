@if (Auth::user()->perfil->nome == 'admin')
    @if ($tipo == 'time')
    <div class="row">
        <a href="{{ route('time.edit', $data) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
        <form action="{{ route('time.destroy', $data)}}" method="post" >
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
        </form>
        <button type="button" class="ml-2 btn btn-sm btn-default" data-toggle="modal" data-target="#modal-default" onclick="carregaTabelaJogadores({{$data->id}})"><i class="ni ni-user-run"></i> Jogadores</button>
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
            <a href="{{ route('jogador.edit', $data) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
            <form action="{{ route('jogador.destroy', $data)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
            </form>
        </div>
    @endif
@else
    @if ($tipo == 'time')
        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-default" onclick="carregaTabelaJogadores({{$data->id}})"><i class="ni ni-user-run"></i> Jogadores</button>
    @endif
@endif
