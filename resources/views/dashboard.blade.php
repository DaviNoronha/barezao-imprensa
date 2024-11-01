@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    @include('layouts.content.times_cards')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
