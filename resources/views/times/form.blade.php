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
                        <h1>Time</h1>
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
                @if(isset($time))
                    {!! Form::model($time, ['method' => 'PUT', 'route' => ['time.update', $time->id], 'enctype' => 'multipart/form-data']) !!}
                @else
                    {!! Form::open(['route' => 'time.store', 'enctype' => 'multipart/form-data']) !!}
                @endif
                <div class="row">
                    <div class="form-group col-6">
                        {!! Form::label('time', 'Time') !!}
                        {!! Form::text('time', null, ['class' => 'form-control', 'id' => 'time', 'name' => 'time', 'required' => true]) !!}
                    </div>
                    
                    <div class="form-group col-6">
                        {!! Form::label('empresa', 'Empresa') !!}
                        {!! Form::text('empresa', null, ['class' => 'form-control', 'id' => 'empresa', 'name' => 'empresa', 'required' => true]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('escudo', 'Escudo do Time') !!}
                        {!! Form::file('escudo', ['class' => 'form-control', 'id' => 'escudo', 'name' => 'escudo', 'required' => !isset($time)]) !!}
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('logo', 'Logo da Empresa') !!}
                        {!! Form::file('logo', ['class' => 'form-control', 'id' => 'logo', 'name' => 'logo', 'required' => !isset($time)]) !!}
                    </div>
                    
                    <div class="form-group">
                        <a href="{{ route('time.index') }}" class="btn btn-default">Voltar</a>
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    </div>
    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush


