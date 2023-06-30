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
            <div class="col-md-12">
                <div class="card">
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
                        orderable: false,
                        searchable: false
                    },
                    {data: 'numero', name: 'numero', title:"N° do Jogador"},
                    {data: 'nome', name: 'nome', title:"Nome"},
                    {data: 'time', name: 'time', title:"Time"},
                    {data: 'funcao', name: 'funcao', title:"Função"},
                    {data: 'tipo', name: 'tipo', title:"Tipo"},
                ],
                searching: true,
            });

        });
    </script>
@endpush
