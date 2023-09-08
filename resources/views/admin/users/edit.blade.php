@extends('layouts.app')

@section('content')
    <div class="card mt-3">

        <div class="card-header">
            USUÁRIOS - Editar Usuário
        </div>

        <form action="{{route('users.update',$user->id)}}" method="post">
            @csrf
            @method('put')

        <div class="card-body">

            <div class="row mb-3">
                <label class="col-sm-1 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-1 col-form-label">Função</label>
                <div class="col-sm-6">
                    <select name="role_id" class="form-select">
                        <option value="">Selecione uma opção....</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected($role->id == $user->role_id)>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-success">Editar</button>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
        </div>

        </form>

    </div>
@endsection
