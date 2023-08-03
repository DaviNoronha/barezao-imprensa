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
                        <h1>Jogador</h1>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                @if(isset($jogador))
                    {!! Form::model($jogador, ['method' => 'PUT', 'route' => ['jogador.update', $jogador->id], 'enctype' => 'multipart/form-data']) !!}
                @else
                    {!! Form::open(['route' => 'jogador.store', 'enctype' => 'multipart/form-data']) !!}
                @endif
                <div class="row">
                    <div class="form-group col-6">
                        {!! Form::label('nome', 'Nome Completo') !!}
                        {!! Form::text('nome', null, ['class' => 'form-control', 'id' => 'nome', 'name' => 'nome', 'required' => true]) !!}
                    </div>
                    
                    <div class="form-group col-4">
                        {!! Form::label('data_nascimento', 'Data Nascimento') !!}
                        {!! Form::text('data_nascimento', null, ['class' => 'form-control', 'id' => 'data_nascimento', 'name' => 'data_nascimento', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-2">
                        {!! Form::label('idade', 'Idade') !!}
                        {!! Form::number('idade', isset($jogador) ? $jogador->idade : null, ['class' => 'form-control', 'id' => 'idade', 'name' => 'idade', 'required' => true, 'readonly' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('numero', 'N° do Jogador') !!}
                        {!! Form::number('numero', null, ['class' => 'form-control', 'id' => 'numero', 'name' => 'numero', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('nome_camisa', 'Nome na Camisa') !!}
                        {!! Form::text('nome_camisa', null, ['class' => 'form-control', 'id' => 'nome_camisa', 'name' => 'nome_camisa', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('cpf', 'CPF, RG, ou DRT') !!}
                        {!! Form::text('cpf', null, ['class' => 'form-control', 'id' => 'cpf', 'name' => 'cpf', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('funcao', 'Função no Trabalho') !!}
                        {!! Form::text('funcao', null, ['class' => 'form-control', 'id' => 'funcao', 'name' => 'funcao', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('time_id', 'Empresa/Time') !!}
                        {!! Form::select('time_id', $times, null, ['class' => 'form-control', 'id' => 'time_id', 'name' => 'time_id', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('tipo', 'Tipo de Jogador') !!}
                        {!! Form::select('tipo', [0 => 'Imprensa', 1 => 'Estrangeiro', 2 => 'Convidado'], null, ['class' => 'form-control', 'id' => 'tipo', 'name' => 'tipo', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('foto', 'Foto do Jogador') !!}
                        {!! Form::file('foto', ['class' => 'form-control', 'id' => 'foto', 'name' => 'foto', 'required' => !isset($jogador)]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('documento', 'Documento do Jogador') !!}
                        {!! Form::file('documento', ['class' => 'form-control', 'id' => 'documento', 'name' => 'documento', 'required' => !isset($jogador)]) !!}
                    </div>
                    
                    <div class="form-group">
                        <a href="{{ route('jogador.index') }}" class="btn btn-default">Voltar</a>
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    </div>
    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#data_nascimento').mask('00/00/0000');
        });
        $('#nome').change(function() {
            let nome = $(this).val();
            $.ajax({
                type : "GET",
                url : "{{ route('jogador.pesquisar') }}",
                data: {
                    search: nome
                },
                success:function(data) {
                    if (data) { 
                        $('#data_nascimento').val(data.data_nascimento);
                        $('#idade').val(data.idade);
                        $('#numero').val(data.numero);
                        $('#nome_camisa').val(data.nome_camisa);
                        $('#cpf').val(data.cpf);
                        $('#funcao').val(data.funcao);
                        $('#time_id').val(data.time_id).change();
                        $('#tipo').val(data.tipo).change();
                    }
                }
            });
        })
        $('#data_nascimento').change(function() {
            let dataNascimento = $(this).val();
            dataNascimento = moment(dataNascimento, 'DD/MM/YYYY');
            dataNascimento = new Date(dataNascimento);
            var dataAtual = new Date();
            var idade = Math.floor((dataAtual - dataNascimento) / (365.25 * 24 * 60 * 60 * 1000));
            $('#idade').val(idade);
        });
    </script>
@endpush


