@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="container mt--7 card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <h1>Cadastrar Usuário</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method='POST' action="{{ route('user.store') }}" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="nome">Nome: </label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome')}}" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email')}}" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="password">Senha: </label>
                            <input type="password" name="password" id="password" class="form-control" value="{{ old('password')}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="perfil_id">Perfil do Usuário:</label>
                            <select class="form-control" id="perfil_id" name="perfil_id" required>
                                <option value='0'>Selecione um Perfil</option>
                                @foreach ($perfis as $perfil)
                                    <option value="{{$perfil->id}}">{{$perfil->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="time_id_group" class="form-group col-sm-6">
                            <label for="time_id">Time:</label>
                            <select class="form-control" id="time_id" name="time_id" required>
                                <option value='0'>Selecione um Time</option>
                                @foreach ($times as $time)
                                    <option value="{{$time->id}}">{{$time->empresa}} - {{$time->time}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a href="{{ route('user.index') }}" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#perfil_id').on('change', function() {
            $('#time_id').prop('required', true);
            $('#time_id_group').attr('hidden', false);
            if ($('#perfil_id').val() == 1) {
                $('#time_id').prop('required', false);
                $('#time_id_group').attr('hidden', true);
            };

        });
    </script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

