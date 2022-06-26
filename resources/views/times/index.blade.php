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
                                <h1>Times</h1>
                            </div>
                            <div class="col-md-8 text-right">
                                <a href="{{ route('time.create') }}" class="btn btn-primary">Inscrever Time</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-3">
                            <table id="tabela-times" class="table align-items-center table-flush w-100">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Jogadores - <span id="time-selecionado">Time</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="tabela-jogadores" >
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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

        function exibirModalJogadores() {
            $("#modal-jogadores").modal('show');
        }
    </script>
@endpush
