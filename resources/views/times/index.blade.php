@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @isset($success)
                        @if($success)
                        <div class="col-md-12">
                            <div class="alert alert-success mt-3">
                                <strong>Sucesso!</strong> {{$mensagem}}
                            </div>
                        </div>
                        @endif
                    @endisset
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 text-left">
                                <h1>Times</h1>
                            </div>
                            @if (Auth::user()->perfil->nome == 'admin')
                                <div class="col-md-8 text-right">
                                    <a href="{{ route('time.create') }}" class="btn btn-primary">Inscrever Time</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabela-times" class="table table-striped align-items-center table-flush w-100">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(function () {
            var table = $('#tabela-times').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                },
                ajax: "{{ route('datatable.time') }}",
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Ações',
                        orderable: true,
                        searchable: true
                    },
                    {data: 'time', name: 'time', title:"Time"},
                    {data: 'empresa', name: 'empresa', title:"Empresa"},
                ],
                searching: false,
            });

        });

        function carregaTabelaJogadores(timeId) {
            var table = $('#tabela-jogadores').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                },
                ajax: {
                    url: "{{ route('datatable.jogador') }}",
                    data : {
                        timeId: timeId,
                    }
                },
                columns: [
                    {data: 'numero', name: 'numero', title:"N° do Jogador"},
                    {data: 'nome', name: 'nome', title:"Nome"},
                    {data: 'time', name: 'time', title:"Time"},
                ],
                paging: false,
                info: false,
                searching: false,
            });
        }
    </script>
@endpush
