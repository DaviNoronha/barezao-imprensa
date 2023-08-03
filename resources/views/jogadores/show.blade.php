@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7 d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-around card-barezao">
                        <div class="retrato p-2">
                            <img class="imagem" src="{{ asset('storage') . '/' . $jogador->foto }}" alt="">
                            <div class="mt-2">
                                <div class="d-flex justify-content-around align-items-center">
                                    <img style="max-width:200px; max-height:50px" src="{{ asset('storage') . '/' . $jogador->time->logo }}" alt="">
                                    <img style="width:50px" src="{{ asset('storage') . '/' . $jogador->time->escudo }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-barezao w-100" style="background-color: #bbc7d4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <h1 class="text-primary" style="font-size: 50px">{{$jogador->numero}} <span class="text-default ">{{$jogador->nome_camisa}}</span></h1>
                                    </div>
                                    <img src="{{ asset('storage') }}/img/barezao_logo.png" style="width: 100px; height: 70px" alt="...">
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mt--2">
                                            <div class="col-md-8">
                                                <span class="text-default" style="font-size: 18px">{{$jogador->nome}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="text-primary" style="font-size: 18px">{{$jogador->tipo_formatted}}</span>
                                            </div>
                                        </div>
                                        <hr class="mt--1 border-default">
                                        <h3 class="text-default display-5"><span class="text-default">Empresa: </span>{{$jogador->time->empresa}}
                                        <h3 class="text-default display-5"><span class="text-default">Função: </span>{{$jogador->funcao}}</h3>
                                        @if (Auth::user()->perfil->nome == 'admin')
                                            <h3 class="text-default display-5"><span class="text-default">Documento: </span>{{$jogador->cpf}}</h3>
                                        @endif
                                        <h3 class="text-default display-5">
                                            <span class="text-default mr-5" >Data de Nascimento: <span class="text-default">{{$jogador->data_nascimento}}</span></span> 
                                            <span class="text-default">Idade: </span> {{$jogador->idade}}
                                        </h3>
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
