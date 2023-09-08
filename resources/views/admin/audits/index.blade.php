@extends('layouts.app')

@section('content')

    <div class="card mt-3">

        <div class="card-header">
            Auditoria - Pesquisar Evento
        </div>

        <form action="{{ route('audits.search') }}" method="post">
            @csrf

            <div class="card-body">

                <div class="row">

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="date_initial">
                    </div>

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="date_final">
                    </div>

                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-sm btn-secondary">
                            <i class="fa fa-search m-1"></i> Pesquisar
                        </button>
                    </div>

                </div>


            </div>

        </form>

    </div>

    @isset($audits)
        <div class="card mt-3">

            <div class="card-header">
                Auditoria - Resultado da Pesquisa
            </div>

            <div class="card-body">

                <table class="table table-sm table-bordered mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Classe</th>
                            <th class="text-center">Evento</th>
                            <th>Data do Evento</th>
                            <th class="text-center">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($audits as $audit)
                            <tr>
                                <td class="text-center">{{ $audit->id }}</td>
                                <td>{{ $audit->auditable_type }}</td>
                                <td class="text-center">{{ $audit->event }}</td>
                                <td>{{ $audit->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('audits.show', $audit->id) }}" target="_blank"
                                        class="btn btn-sm btn-success">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    @endisset
@endsection
