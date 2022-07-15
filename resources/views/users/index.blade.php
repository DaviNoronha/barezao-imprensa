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
                                <h1>Usuários</h1>
                            </div>
                            <div class="col-md-8 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-primary">Cadastrar Usuário</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-3">
                            <table id="tabela-users" class="table table-striped align-items-center table-flush w-100">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('#tabela-users').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                },
                ajax: "{{ route('datatable.user') }}",
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Ações',
                        orderable: false,
                        searchable: false
                    },
                    {data: 'nome', name: 'nome', title: 'Nome'},
                    {data: 'email', name: 'email', title: 'E-mail'},
                    {data: 'perfil', name: 'perfil', title: 'Perfil de usuário'},
                    {data: 'time', name: 'time', title: 'Time do usuário'},
                ],
                searching: true,
            });

        });

        function exibirModalJogadores() {
            $("#modal-jogadores").modal('show');
        }
    </script>
@endpush

