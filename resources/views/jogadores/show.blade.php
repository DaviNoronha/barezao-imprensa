@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <div class="retrato p-2">
                                <img class="w-100 img-thumbnail " src="{{ asset('storage') . '/' . $jogador->foto }}" class="w-50" alt="">
                                <div class="container mt-2">
                                    <div class="row d-flex justify-content-around align-items-center">
                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex justify-content-around align-items-center">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img style="width:35px" src="{{ asset('storage') . '/' . $jogador->time->escudo }}" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>{{$jogador->time->time}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card card-jogador bg-dark">
                                <div class="card-body">
                                    <div class="row">
                                        <h1 class="ml-2 mr-2 mt--2 text-primary display-1">{{$jogador->numero}}</h1>
                                        <div class="col-md-8">
                                            <h1 class="text-white display-2">{{$jogador->nome_camisa}}</h1>
                                            <div class="row mt--2">
                                                <div class="col-md-8">
                                                    <span class="text-white display-4">{{$jogador->nome}}</span>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <span class="text-primary display-5">{{$jogador->tipo == '0' ? 'Imprensa' : 'Estrangeiro'}}</span>
                                                </div>
                                            </div>
                                            <hr class="mt--1 border-primary">
                                            <h2 class="mt--3 text-white display-5"><span class="text-primary">Data de Nascimento: </span>{{$jogador->data_nascimento}}</h2>
                                            <h2 class="text-white display-5"><span class="text-primary">Empresa: </span>{{$jogador->time->empresa}}
                                            <h2 class="text-white display-5"><span class="text-primary">Ocupação: </span>{{$jogador->funcao}}</h2>
                                        </div>
                                    </div>
                                </div>
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
