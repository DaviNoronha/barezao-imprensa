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
                                <h1>Jogadores - {{$time->time}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-3">
                            <table id="tabela-jogadores" class="table table-striped align-items-center table-flush w-100">
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
            var table = $('#tabela-jogadores').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                },
                ajax: {
                    url: "{{ route('datatable.time.jogadores') }}",
                    data: {
                        timeId: "{{$time->id}}"
                    }
                },
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Ações',
                        orderable: true,
                        searchable: true
                    },
                    {data: 'numero', name: 'numero', title:"N° do Jogador"},
                    {data: 'nome', name: 'nome', title:"Nome"},
                    {data: 'time', name: 'time', title:"Time"},
                    {data: 'funcao', name: 'funcao', title:"Função"},
                    {data: 'tipo', name: 'tipo', title:"Tipo"},
                ],
                searching: false,
            });

        });
    </script>
@endpush
