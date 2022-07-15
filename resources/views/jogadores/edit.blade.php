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
                        <h1>Editar Jogador</h1>
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
                <form action="{{ route('jogador.update', $jogador->id) }}" method='POST' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="nome">Nome Completo: </label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $jogador->nome }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="numero">N° do Jogador: </label>
                            <input type="text" class="form-control" id="numero" name="numero" value="{{ $jogador->numero }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="nome_camisa">Nome na camisa: </label>
                            <input type="text" class="form-control" id="nome_camisa" name="nome_camisa" value="{{ $jogador->nome_camisa }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="cpf">CPF, RG, ou DRT: </label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $jogador->cpf }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="funcao">Função no Trabalho: </label>
                            <input type="funcao" class="form-control" id="funcao" name="funcao" value="{{ $jogador->funcao }}" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="time_id">Time:</label>
                            <select class="form-control" id="time_id" name="time_id" required>
                                <option value='0'>Selecione um Time</option>
                                @foreach ($times as $time)
                                    <option value="{{$time->id}}" {{$time->id == $jogador->time->id ? 'selected' : ''}}>{{$time->empresa}} - {{$time->time}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="tipo">Tipo do Jogador:</label>
                            <select class="form-control" id="tipo" name="tipo" required>
                                <option value='0' {{$jogador->tipo == 0 ? 'selected' : ''}}>Imprensa</option>
                                <option value='1' {{$jogador->tipo == 1 ? 'selected' : ''}}>Estrangeiro</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="foto">Foto do Jogador: </label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="form-group col-6">
                            <label for="documento">Documento do Jogador: </label>
                            <input type="file" class="form-control" id="documento" name="documento">
                        </div>
                    </div>
                    <a href="{{ route('jogador.index') }}" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

