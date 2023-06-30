@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-3 pt-md-4">
        <div class="mb-3 d-flex justify-content-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('storage') }}/img/barezao_logo.png" style="width: 200px" alt="...">
            </a>
        </div>
        <h1 class="text-white text-center">Edição 2022</h1>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            @foreach ($times as $time)
                <div class="col-md-3 mt-2">
                    <a href="{{ route('edicao.jogadores', $time->id) }}">
                        <div class="card card-barezao btn btn-secondary mb-2">
                            <div class="card-body p-1">
                                <div class="d-flex justify-content-around align-items-center">
                                        <img src="{{ asset('storage') . '/' . $time->logo }}" onerror="this.src='{{ asset('storage') }}/img/barezao_logo.png'" class="text-center" style="width:80px; height:80px" alt="">
                                    <div>
                                        <img src="{{ asset('storage') . '/' . $time->escudo }}" class="text-center" style="width:80px; height:80px" alt="">
                                        <h2 class="text-center">{{$time->time}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('edicao.jogadores', $time->id) }}">
                        <div class="card card-barezao btn btn-secondary d-flex justify-content-around align-items-center p-0">
                            <h3>{{$time->empresa}}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
