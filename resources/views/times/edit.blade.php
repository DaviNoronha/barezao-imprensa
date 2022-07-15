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
                        <h1>Editar Time</h1>
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
                <form action="{{ route('time.update', $time->id) }}" method='POST' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="time">Time: </label>
                            <input type="text" class="form-control" id="time" name="time" value="{{ $time->time }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="empresa">Empresa: </label>
                            <input name="empresa" id="empresa" class="form-control" value="{{ $time->empresa }}" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="escudo">Escudo do Time: </label>
                            <input type="file" class="form-control" id="escudo" name="escudo">
                        </div>
                    </div>
                    <a href="{{ route('time.index') }}" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush


