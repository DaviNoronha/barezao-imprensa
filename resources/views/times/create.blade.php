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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method='POST' action="{{ route('time.store') }}" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="time">Time: </label>
                            <input type="text" class="form-control" id="time" name="time" value="{{ old('time')}}" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="empresa">Empresa: </label>
                            <input name="empresa" id="empresa" class="form-control" value="{{ old('empresa')}}" required>
                        </div>
                    </div>
                    <a href="{{ route('time.index') }}" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    @isset($success)
                        @if($success)
                            <div class="alert alert-success mt-3">
                                <strong>Sucesso!</strong> Time foi inscrito com sucesso.
                            </div>
                        @else
                            <div class="alert alert-danger mt-3">
                                <strong>Erro!</strong> Ocorreu um erro ao inscrever o time.
                            </div>
                        @endif
                    @endisset
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush


