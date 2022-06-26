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
            <div class="card-body">
                <form method='POST' action="{{ route('jogador.store') }}" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nome">Nome: </label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('time')}}" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="time_id">Time:</label>
                            <select class="form-control" id="time_id" name="time_id" required>
                                <option value='0'>Selecione um Time</option>
                                @foreach ($times as $time)
                                    <option value="{{$time->id}}">{{$time->empresa}} - {{$time->time}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="documento">Documento: </label>
                            <input type="file" class="form-control" id="documento" name="documento" value="{{ old('documento')}}" required>
                        </div>
                    </div>
                    <a href="{{ route('jogador.index') }}" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    @isset($success)
                        @if($success)
                            <div class="alert alert-success mt-3">
                                <strong>Sucesso!</strong> Jogador foi inscrito com sucesso!
                            </div>
                        @else
                            <div class="alert alert-danger mt-3">
                                <strong>Erro!</strong> Ocorreu um erro ao inscrever o jogador!
                            </div>
                        @endif
                    @endisset
                </form>
            </div>
        </div>
    </div>
@endsection

