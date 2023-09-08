@extends('layouts.app')

@section('content')
    <div class="card mt-3">

        <div class="card-header">
            FUNÇÕES - Cadastrar Função
        </div>

        <form action="{{ route('roles.update', $role->id) }}" method="post">
            @csrf
            @method('put')

            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-sm-1 col-form-label">Nome</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Editar</button>
            </div>

        </form>

    </div>

    <div class="card mt-3">

        <div class="card-header">
            FUNÇÕES - Associar Permissões
        </div>

        <form action="{{ route('roles.permissions', $role->id) }}" method="post">
            @csrf
            <div class="card-body ms-2">

                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="form-check form-switch col-sm-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="{{ $permission->id }}"
                                name="permissions[]" value="{{ $permission->id }}" @checked($role->hasPermission($permission->name))>
                            <label class="form-check-label" for="{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Associar</button>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
            </div>
        </form>

    </div>
@endsection
