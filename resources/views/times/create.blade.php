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
                        <h1>Inscrever Time</h1>
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
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush


