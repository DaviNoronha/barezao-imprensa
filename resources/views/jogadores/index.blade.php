@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 text-left">
                                <h1>Jogadores</h1>
                            </div>
                            <div class="col-md-8 text-right">
                                <a href="{{ route('jogador.create') }}" class="btn btn-primary">Inscrever jogador</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-3">
                            <table id="tabela-jogadores" class="table align-items-center table-flush w-100">
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
                ajax: "{{ route('datatable.jogador') }}",
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Ações',
                        orderable: true,
                        searchable: true
                    },
                    {data: 'nome', name: 'nome', title:"Nome"},
                    {data: 'time', name: 'time', title:"Time"},
                ],
                searching: false,
            });

        });
    </script>
@endpush
