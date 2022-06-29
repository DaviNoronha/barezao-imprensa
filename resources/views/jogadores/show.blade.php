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
                                <h1>{{$jogador->nome}}</h1>
                                <h2>Função: {{$jogador->funcao}}</h2>
                                <h2>Time: {{$jogador->time->time}}</h2>
                                <h3>Nome na camisa: {{$jogador->nome_camisa}}</h3>
                                <h3>Número da camisa: {{$jogador->numero}}</h3>
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
