@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 text-left">
                                <h1>Jogador</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mr--9">
                                <img src="{{ asset('storage') . '/' . $jogador->foto }}" class="w-50" alt="">
                            </div>
                            <div class="col-md-6">
                                <h1 class="mb--1">{{$jogador->nome}}</h1>
                                <h4>{{$jogador->tipo == '0' ? 'Imprensa' : 'Estrangeiro'}}</h4>
                                <hr class="mt--1">
                                <ul>
                                    <li><h2><b>Time:</b> {{$jogador->time->time}}</h2></li>
                                    <li><h2><b>Empresa:</b> {{$jogador->time->empresa}}</h2></li>
                                    <li><h2><b>Função:</b> {{$jogador->funcao}}</h2></li>
                                    <li><h2><b>Nome na camisa:</b> {{$jogador->nome_camisa}}</h2></li>
                                    <li><h2><b>Número da camisa:</b> {{$jogador->numero}}</h2></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">

    </script>
@endpush
